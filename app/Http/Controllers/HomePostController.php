<?php

namespace App\Http\Controllers;

use App\Basket;
use App\BlogsComments;
use App\Comments;
use App\ContactUs;
use App\Menu;
use App\Orders;
use App\Products;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class HomePostController extends Controller
{
    public function postContact_us(Request $request)
    {
        try {
            $date = Carbon::now();
            $slug = $request->full_name . $date->format('Y-m-d:H:d:s');
            $contact_us = new ContactUs();
            $contact_us->full_name = $request->full_name;
            $contact_us->subject = $request->subject;
            $contact_us->messages = $request->messages;
            $contact_us->email = $request->email;
            $contact_us->status = 1;
            $contact_us->slug = $slug;
            $contact_us->read_unread = 0;
            $contact_us->save();

            return response(['title' => 'Ugurlu', 'message' => 'Mesajiniz gonderildi,tezlikle elaqe saxliyaciyiq!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesajiniz gonderilmedi!', 'status' => 'error']);
        }

    }

    public function postBlogsComments(Request $request,$id)
    {
        try {
                $blogs_comments = new BlogsComments();
                if (Auth::check()) {
                    $blogs_comments->full_name = Auth::user()->name . '' . Auth::user()->surname;
                    $blogs_comments->email = Auth::user()->email;
                    $blogs_comments->user_id = Auth::user()->id;
                } else {
                    $blogs_comments->full_name = $request->name;
                    $blogs_comments->email = $request->email;
                    $blogs_comments->user_id = 0;
                }

                if ($request->parent_id != null) {
                    $blogs_comments->parent_id = $request->parent_id;
                } else {
                    $blogs_comments->parent_id = 0;
                }

                $blogs_comments->texts = $request->comment;
                $blogs_comments->blog_id = $id;
                $blogs_comments->slug = $request->name . Carbon::now();
                $blogs_comments->status = 0;
                $blogs_comments->save();
                return response(['title' => 'Ugurlu', 'message' => 'Reyiniz gonderildi,admin terefinden tesdiqlikden sonra yayinlanacaq!', 'status' => 'success']);
            } catch (\Exception $exception) {
                return response(['title' => 'Ugursuz!', 'message' => 'Reyiniz gonderilmedi!', 'status' => 'error']);
            }


    }


    public function postCommentAndBasket(Request $request, $id)
    {
        try {
            if ($request->submitComments != null) {


                $comment = new Comments();
                if (Auth::check()) {
                    $comment->full_name = Auth::user()->name . '' . Auth::user()->surname;
                    $comment->email = Auth::user()->email;
                    $comment->user_id = Auth::user()->id;
                } else {
                    $comment->full_name = $request->name;
                    $comment->email = $request->email;
                    $comment->user_id = 0;
                }

                if ($request->parent_id != null) {
                    $comment->parent_id = $request->parent_id;
                } else {
                    $comment->parent_id = 0;
                }


                $comment->texts = $request->comment;
                $comment->product_id = $id;
                $comment->slug = $request->name . Carbon::now();
                $comment->status = 0;
                $comment->save();

                return response(['title' => 'Ugurlu', 'message' => 'Reyiniz gonderildi,admin terefinden tesdiqlikden sonra yayinlanacaq!', 'status' => 'success']);

            } else if ($request->addCard != null) {
                if (Auth::check()) {
                    $prod = Products::find($request->prod_id);
                    $payment = '';
                    if ($prod->discount_price != 0) {
                        $payment = $request->quantity * $prod->discount_price;
                    } else {
                        $payment = $request->quantity * $prod->price;
                    }
                    $date = Carbon::now();
                    $slug = $request->full_name . $date->format('Y-m-d:H:d:s');
                    $old_basket = Basket::where(['product_id' => $request->prod_id, 'user_id' => Auth::user()->id, 'status' => 1])->first();
                    if ($old_basket == null) {
                        $basket = new Basket();
                        $basket->user_id = Auth::user()->id;
                        $basket->product_id = $request->prod_id;
                        $basket->product_count = $request->quantity;
                        $basket->payment = $payment;
                        $basket->slug = $slug;
                        $basket->status = 1;
                        $basket->save();
                    } else if ($old_basket != null && $old_basket->status == 1) {
                        $old_basket->product_count += $request->quantity;;
                        $old_basket->payment += $payment;
                        $old_basket->save();
                    } else {
                        $basket = new Basket();
                        $basket->user_id = Auth::user()->id;
                        $basket->product_id = $request->prod_id;
                        $basket->product_count = $request->quantity;
                        $basket->payment = $payment;
                        $basket->slug = $slug;
                        $basket->status = 1;
                        $basket->save();
                    }

                } else {
                    return response(['title' => 'Ugursuz!', 'message' => 'Xayis edirik giris edin!', 'status' => 'error', 'status_login' => 'error']);
                }
                return response(['title' => 'Ugurlu', 'message' => 'Mehsulunuz sebete ugurla elave edildi', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Mehsulunuz sebete elave edilmedi', 'status' => 'error']);
            }
        } catch (\Exception $exception) {

            return response(['title' => 'Ugursuz!', 'message' => 'Reyiniz gonderilmedi!', 'status' => 'error']);
        }
    }


    public function postMyProfile(Request $request)
    {
        {
            if (isset($request->image)) {
                $validate = Validator::make($request->all(), [
                    'image' => 'mimes:jpg,jpeg,png,gif',
                ]);

                if ($validate->fails()) {
                    return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
                }


                $image = Input::file('image');
                $image_uzanti = Input::file('image')->getClientOriginalExtension();
                $image_ad = 'image.' . $image_uzanti;
                Storage::disk('uploads')->makeDirectory('FrmyprofileImg');
                Image::make($image->getRealPath())->resize(320, 220)->save('uploads/FrmyprofileImg/' . $image_ad);
            }

            try {
                unset($request['_token']);
                if (isset($request->image)) {
                    unset($request->last_image);
                    $image_new = file_get_contents($image->getRealPath());


                    User::where('id', $request->id)->update(['name' => $request->name, 'surname' => $request->surname, 'father_name' => $request->father_name,
                        'mobile' => $request->mobile, 'fb_profile' => $request->fb_profile, 'inst_profile' => $request->inst_profile, 'wp_profile' => $request->wp_profile,
                        'address' => $request->address, 'gender' => $request->gender, 'email' => $request->email, 'image' => $image_new]);
                    return response(['title' => 'Ugurlu!', 'message' => 'My Profile update oldu', 'status' => 'success']);
                } else {
                    unset($request->image);
                    User::where('id', $request->id)->update(['name' => $request->name, 'surname' => $request->surname, 'father_name' => $request->father_name,
                        'mobile' => $request->mobile, 'fb_profile' => $request->fb_profile, 'inst_profile' => $request->inst_profile, 'wp_profile' => $request->wp_profile,
                        'address' => $request->address, 'gender' => $request->gender, 'email' => $request->email]);
                    return response(['title' => 'Ugurlu!', 'message' => 'My Profile update oldu', 'status' => 'success']);
                }


            } catch (\Exception $exception) {
                return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
            }


        }

    }

    public function postChangePassword(Request $request)
    {
        if ($request->new_password != '') {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                if ($request->new_password == $request->old_password) {
                    return response(['title' => 'Ugursuz!', 'message' => 'Kohne sifre ile yeni sifre eyni ola bilmez!', 'status' => 'error']);
                } else {
                    if ($request->new_password == $request->retain_new_password) {

                        $new_pass = Hash::make($request->new_password);
                        User::where('id', Auth::user()->id)->update(['password' => $new_pass,]);

                        return response(['title' => 'Ugurlu!', 'message' => 'Sifre Deyisdi', 'status' => 'success']);
                    } else {
                        return response(['title' => 'Ugursuz!', 'message' => 'Sifreler uyusmur!', 'status' => 'error']);
                    }
                }
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Daxil edilmis kohne sifre yalnisdir', 'status' => 'error']);
            }
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Yeni sifre xanasi bosdur', 'status' => 'error']);
        }
    }

    public function postDeleteMyBasket(Request $request)
    {
        try {
            Basket::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'MyBasket Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'MyBasket silmek olmur!', 'status' => 'error']);
        }
    }

    public function postMyBasketEdit(Request $request, $id)
    {
        try {
            $basket = Basket::find($id);
            $product = Products::find($basket->product_id);

            if ($product->discount_price != 0) {
                $payment = $request->product_count * $product->discount_price;
            } else {
                $payment = $request->product_count * $product->price;
            }

            $basket->product_count = $request->product_count;
            $basket->payment = $payment;
            $basket->save();
            return response(['title' => 'Ugurlu!', 'message' => 'Productun sayi deyiwildi', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Productun sayin deyiwmek olmadi!', 'status' => 'error']);
        }


    }


    public function postCheckOut(Request $request)
    {
        try {
            $date = Carbon::now();
            $slug = $request->name . '-' . $request->surname . $date->format('Y-m-d:H:d:s');
            $basket = Basket::where(['user_id' => $request->user_id, 'status' => 1])->get();
            foreach ($basket as $b) {
                $product = Products::find($b->product_id);
                $product->real_count = $product->real_count - $b->product_count;
                $product->save();
                $b->status = 2;
                $b->slug = $slug;
                $b->save();
            }

            $orders = new Orders();
            $orders->users_id = $request->user_id;
            $orders->address = $request->address;
            $orders->status = 0;
            $orders->slug = $slug;
            $orders->save();

            return response(['title' => 'Ugurlu!', 'message' => 'Ugurlu aliw Elediz!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Aliw elemek mumkun olmadi', 'status' => 'error']);
        }

    }

    public function postPurchasedGoodsDelete(Request $request)
    {
        try {
            $basket = Basket::where(['user_id' => $request->user_id, 'slug' => $request->slug])->where('status', '<>', [3, 4])->get();
            foreach ($basket as $b) {
                $product = Products::find($b->product_id);
                $product->real_count = $product->real_count + $b->product_count;
                $product->save();
            }
            Basket::where(['user_id' => $request->user_id, 'slug' => $request->slug, 'product_id' => $request->product_id])->where('status', 2)->delete();
            $b = Basket::where(['user_id' => $request->user_id, 'slug' => $request->slug])->get();
            $count = count($b);
            if ($count == 0) {
                Orders::where(['users_id' => $request->user_id, 'slug' => $request->slug])->delete();
            }
            return response(['title' => 'Ugurlu!', 'message' => 'Order Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Order silmek mumkun olmadi', 'status' => 'error']);
        }
    }

    public function postLocale(Request $request){
        Session::put(['locale'=>$request->local]);
        App::setLocale(Session::get('locale'));
    }

}
