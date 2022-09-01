<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Basket;
use App\BlogCategory;
use App\Blogs;
use App\BlogsComments;
use App\Brands;
use App\Categoryes;
use App\Comments;
use App\ContactUs;
use App\Menu;
use App\Orders;
use App\OurTeam;
use App\OurTeamRoles;
use App\Products;
use App\Reports;
use App\Setting;
use App\Slideshow;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use mysql_xdevapi\Exception;

class AdminPostController extends Controller
{
    public function postSetting(Request $request)
    {
        if (isset($request->logo)) {
            $validate = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_ad = 'logo.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(220, 110)->save('uploads/img/' . $logo_ad);


        }


        try {
            unset($request['_token']);
            if (isset($request->logo)) {
                unset($request->last_loqo);
                $logo_new = file_get_contents($logo->getRealPath());


                Setting::where('id', $request->id)->update(['email' => $request->email,
                    'mobile' => $request->mobile, 'address' => $request->address, 'blog_video' => $request->blog_video, 'logo' => $logo_new]);
                return response(['title' => 'Ugurlu!', 'message' => 'Setting update oldu', 'status' => 'success']);
            } else {
                unset($request->loqo);
                Setting::where('id', $request->id)->update(['email' => $request->email,
                    'mobile' => $request->mobile, 'address' => $request->address, 'blog_video' => $request->blog_video]);
                return response(['title' => 'Ugurlu!', 'message' => 'Setting update oldu', 'status' => 'success']);
            }


        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }

    }


    public function postAboutUs(Request $request)
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
            Storage::disk('uploads')->makeDirectory('img2');
            Image::make($image->getRealPath())->resize(320, 220)->save('uploads/img2/' . $image_ad);

        }

        try {
            unset($request['_token']);
            if (isset($request->image)) {
                unset($request->last_image);
                $image_new = file_get_contents($image->getRealPath());


                AboutUs::where('id', $request->id)->update(['title' => $request->title,
                    'description' => $request->description, 'our_mission' => $request->our_mission,
                    'our_vision' => $request->our_vision, 'why_us' => $request->why_us, 'who_we_are' => $request->who_we_are, 'image' => $image_new]);
                return response(['title' => 'Ugurlu!', 'message' => 'About Us update oldu', 'status' => 'success']);
            } else {
                unset($request->image);
                AboutUs::where('id', $request->id)->update(['title' => $request->title,
                    'description' => $request->description, 'our_mission' => $request->our_mission,
                    'our_vision' => $request->our_vision, 'why_us' => $request->why_us, 'who_we_are' => $request->who_we_are]);
                return response(['title' => 'Ugurlu!', 'message' => 'About Us update oldu', 'status' => 'success']);
            }


        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }

    }


    public function postMyProfileEdit(Request $request)
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
            Storage::disk('uploads')->makeDirectory('MyprofileImg');
            Image::make($image->getRealPath())->resize(320, 220)->save('uploads/MyprofileImg/' . $image_ad);
        }

        try {
            unset($request['_token']);
            if (isset($request->image)) {
                unset($request->last_image);
                $image_new = file_get_contents($image->getRealPath());


                User::where('id', $request->id)->update(['name' => $request->name, 'surname' => $request->surname, 'father_name' => $request->father_name,
                    'mobile' => $request->mobile, 'fb_profile' => $request->fb_profile, 'inst_profile' => $request->inst_profile, 'wp_profile' => $request->wp_profile,
                    'role_id' => $request->role_id, 'address' => $request->address, 'gender' => $request->gender, 'email' => $request->email, 'image' => $image_new]);
                return response(['title' => 'Ugurlu!', 'message' => 'My Profile update oldu', 'status' => 'success']);
            } else {
                unset($request->image);
                User::where('id', $request->id)->update(['name' => $request->name, 'surname' => $request->surname, 'father_name' => $request->father_name,
                    'mobile' => $request->mobile, 'fb_profile' => $request->fb_profile, 'inst_profile' => $request->inst_profile, 'wp_profile' => $request->wp_profile,
                    'role_id' => $request->role_id, 'address' => $request->address, 'gender' => $request->gender, 'email' => $request->email]);
                return response(['title' => 'Ugurlu!', 'message' => 'My Profile update oldu', 'status' => 'success']);
            }


        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
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


    public function postCommentPublishOrDelete(Request $request)
    {
        try {
            if ($request->btn_publish != null) {
                $comment = Comments::find($request->id);
                if ($comment->status == 1) {
                    return response(['title' => 'Ugursuz!', 'message' => 'Sizin reyiniz artiq aktiv olub!', 'status' => 'error']);
                } else {
                    $comment->status = 1;
                    $comment->save();
                    Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . 'Sizin reyiniz yayimlandi!'], function ($message) use ($request) {
                        $message->to($request->email, $request->full_name)->subject('Product Comments');
                        $message->from('ugurphp@mail.ru', 'Turan Shopping MMC');
                    });
                    return response(['title' => 'Ugurlu!', 'message' => 'Rey ugurlu emaile gonderildi!', 'status' => 'success']);
                }
            } else if ($request->btn_delete != null) {
                Comments::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Comment ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Commenti silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Reyinizi yayindirmaq olmadi', 'status' => 'error']);
        }
    }


    public function postBlogsCommentsPublishOrDelete(Request $request)
    {
        try {
            if ($request->btn_publish != null) {
                $blogs_comments = BlogsComments::find($request->id);
                if ($blogs_comments->status == 1) {
                    return response(['title' => 'Ugursuz!', 'message' => 'Sizin reyiniz artiq aktiv olub!', 'status' => 'error']);
                } else {
                    $blogs_comments->status = 1;
                    $blogs_comments->save();
                    Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . 'Sizin reyiniz yayimlandi!'], function ($message) use ($request) {
                        $message->to($request->email, $request->full_name)->subject('Blog Comments');
                        $message->from('ugurphp@mail.ru', 'Turan Shopping MMC');
                    });
                    return response(['title' => 'Ugurlu!', 'message' => 'Rey ugurlu emaile gonderildi!', 'status' => 'success']);
                }
            } else if ($request->btn_delete != null) {
                BlogsComments::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Blogs Comments ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Blogs Commenti silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Reyinizi yayindirmaq olmadi', 'status' => 'error']);
        }
    }


    public function postCommentEdit(Request $request, $id)
    {
//        dd($request->btn_publish);
        try {
            if ($request->btn_publish != null) {
                $comment = Comments::find($id);
                if ($comment->status == 1) {
                    return response(['title' => 'Ugursuz!', 'message' => 'Sizin reyiniz  artiq aktiv olub!', 'status' => 'error']);
                } else {
                    $comment->status = 1;
                    $comment->save();
                    Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . 'Sizin reyiniz yayimlandi!'], function ($message) use ($request) {
                        $message->to($request->email, $request->full_name)->subject('Product Comments');
                        $message->from('ugurphp@mail.ru', 'Turan Shopping MMC');
                    });
                    return response(['title' => 'Ugurlu!', 'message' => 'Rey ugurlu emaile gonderildi!', 'status' => 'success']);
                }
            } else if ($request->btn_delete != null) {
                Comments::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Comment ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Commenti silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Reyinizi yayindirmaq olmadi', 'status' => 'error']);
        }

    }


    public function postBlogsCommentsEdit(Request $request, $id)
    {
        try {
            if ($request->btn_publish != null) {
                $blogs_comments = BlogsComments::find($id);
                if ($blogs_comments->status == 1) {
                    return response(['title' => 'Ugursuz!', 'message' => 'Sizin reyiniz  artiq aktiv olub!', 'status' => 'error']);
                } else {
                    $blogs_comments->status = 1;
                    $blogs_comments->save();
                    Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . 'Sizin reyiniz yayimlandi!'], function ($message) use ($request) {
                        $message->to($request->email, $request->full_name)->subject('Blog Comments');
                        $message->from('ugurphp@mail.ru', 'Turan Shopping MMC');
                    });
                    return response(['title' => 'Ugurlu!', 'message' => 'Rey ugurlu emaile gonderildi!', 'status' => 'success']);
                }
            } else if ($request->btn_delete != null) {
                BlogsComments::where('id', $request->id)->delete();
                return response(['title' => 'Ugurlu!', 'message' => 'Blogs Comments ugurlu silindi!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Blogs Commenti silmek mumkun olmadi!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Reyinizi yayindirmaq olmadi', 'status' => 'error']);
        }
    }


    public function postMenuEdit(Request $request, $id)
    {
        try {
            Menu::where('id', $request->id)->update(['name' => $request->name,
                'page' => $request->page, 'status' => $request->status]);
            return response(['title' => 'Ugurlu', 'message' => 'Menu update oldu!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Menu update olmadi!', 'status' => 'error']);
        }

    }


    public function postAddBrands(Request $request)
    {

        $slug = utf8_encode($request->name . Carbon::now()->format('y-m-d-HH-mm-ss'));
        if (isset($request->logo)) {
            $validate = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_ad = 'brand' . $slug . '.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('brandImg/brands/');
            Storage::disk('uploads')->put('brandImg/brands/' . $logo_ad, file_get_contents($logo));


            $brand = Brands::where('name', $request->name)->first();
            if ($brand == null) {
                $brand = new Brands();
                $brand->name = $request->name;
                $brand->slug = $slug;
                $brand->status = 1;
                $brand->logo = file_get_contents($logo->getRealPath());
                $brand->save();
                return response(['title' => 'Ugurlu', 'message' => 'Brand elave olundu!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Bu Brend artiq elave edilib', 'status' => 'error']);
            }

        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Sekil secin!', 'status' => 'error']);
        }
    }


    public function postBrandEdit(Request $request)

    {
        $slug = utf8_encode($request->name . Carbon::now()->format('y-m-d-HH-mm-ss'));
        if (isset($request->logo)) {
            $validate = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif olmalidir!', 'status' => 'error']);
            }


            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_ad = $slug . '.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('brandImg/brands/');
            Storage::disk('uploads')->put('brandImg/brands/' . $logo_ad, file_get_contents($logo));


        }

        try {
            unset($request['_token']);
            if (isset($request->logo)) {
                unset($request->last_loqo);
                $logo_new = file_get_contents($logo->getRealPath());


                Brands::where('id', $request->id)->update(['name' => $request->name, 'status' => $request->status, 'logo' => $logo_new]);
            } else {
                unset($request->loqo);
                Brands::where('id', $request->id)->update(['name' => $request->name, 'status' => $request->status]);

            }
            return response(['title' => 'Ugurlu!', 'message' => 'Brand update oldu', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }

    }


    public function postAddMenu(Request $request)
    {
        try {
            $menu = Menu::where('name', $request->name)->first();
            if ($menu == null) {
                $date = Carbon::now()->format('Y-m-d:H:d:s');
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->page = $request->page;
                $menu->slug = $request->name . $date;
                $menu->status = 1;
                $menu->save();
                return response(['title' => 'Ugurlu', 'message' => 'Menu elave olundu!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Bu Menu artiq elave edilib!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Menu elave olmadi!', 'status' => 'error']);
        }
    }


    public function postAddOurTeam(Request $request)
    {
        try {
            $user = OurTeam::where('user_id', $request->user_id)->first();
            if ($user == null) {
                $our_team = new OurTeam();
                $our_team->user_id = $request->user_id;
                $our_team->our_team_role_id = $request->roles_id;
                $our_team->description = $request->description;
                $our_team->save();
                return response(['title' => 'Ugurlu', 'message' => 'User elave olundu!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Bu User artiq elave edilib!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'User elave olmadi!', 'status' => 'error']);
        }
    }


    public function postAddOurTeamRoles(Request $request)
    {
        try {
            $our_team_roles = new OurTeamRoles();
            $our_team_roles->name = $request->name;
            $our_team_roles->save();
            return response(['title' => 'Ugurlu', 'message' => 'Our team role elave olundu!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Our team role ugursuz alindi!', 'status' => 'error']);
        }

    }


    public function postAddCategoryes(Request $request)
    {

        $slug = utf8_encode($request->name . Carbon::now()->format('y-m-d-HH-mm-ss'));
        if (isset($request->logo)) {
            $validate = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_ad = 'category' . $slug . '.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('categoryImg/categoryes/');
            Storage::disk('uploads')->put('categoryImg/categoryes/' . $logo_ad, file_get_contents($logo));

            $categoryes = Categoryes::where('name', $request->name)->first();
            if ($categoryes == null) {
                $categoryes = new Categoryes();
                $categoryes->name = $request->name;
                $categoryes->slug = $slug;
                $categoryes->status = 1;
                $categoryes->logo = file_get_contents($logo->getRealPath());
                $categoryes->save();
                return response(['title' => 'Ugurlu', 'message' => 'Categoriya elave olundu!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Bu Categoriya artiq elave edilib!', 'status' => 'error']);
            }

        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Sekil secin!', 'status' => 'error']);
        }
    }


    public function postCategoryesEdit(Request $request)
    {
        $slug = utf8_encode($request->name . Carbon::now()->format('y-m-d-HH-mm-ss'));
        if (isset($request->logo)) {
            $validate = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_ad = $slug . '.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('categryImg/categoryes/');
            Storage::disk('uploads')->put('categryImg/categoryes/' . $logo_ad, file_get_contents($logo));


        }

        try {
            unset($request['_token']);
            if (isset($request->logo)) {
                unset($request->last_loqo);
                $logo_new = file_get_contents($logo->getRealPath());


                Categoryes::where('id', $request->id)->update(['name' => $request->name, 'status' => $request->status, 'logo' => $logo_new]);
            } else {
                unset($request->loqo);
                Categoryes::where('id', $request->id)->update(['name' => $request->name, 'status' => $request->status]);
            }
            return response(['title' => 'Ugurlu!', 'message' => 'Categoryes elave olundu oldu', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }

    }


    public function postAddProduct(Request $request)
    {
        $date = Carbon::now()->format('y-m-d-HH-dd-ss');
        $slug = $request->name . $date;

        $sekiller = $request->file('images');
        $prod_image = '';

        if (!empty($sekiller)) {
            $i = 0;

            $validate = Validator::make($request->all(), [
                'images.*' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            foreach ($sekiller as $sk) {

                $sekil_uzanti = $sk->getClientOriginalExtension();
                $sekil_ad = $i . '.' . $sekil_uzanti;
                Storage::disk('uploads')->makeDirectory('prodImg/product/' . $slug);
                Storage::disk('uploads')->put('prodImg/product/' . $slug . '/' . $sekil_ad, file_get_contents($sk));
                $prod_image = $prod_image . file_get_contents($sk) . '(xx)';
                $i++;

            }
        }

        $products = Products::where('name', $request->name)->first();
        if ($products == null) {
            $products = new Products();
            $products->name = $request->name;
            $products->real_price = $request->real_price;
            $products->price = $request->price;
            $products->discount_price = $request->discount_price;
            $products->count = $request->count;
            $products->real_count = $request->count;
            $products->raitng = 0;
            $products->description = $request->description;
            $products->slug = $slug;
            $products->status = 1;
            $products->reviews = 0;
            $products->brand_id = $request->brands;
            $products->category_id = $request->categoryes;
            $products->images = $prod_image;
            $products->save();
            return response(['title' => 'Ugurlu', 'message' => 'Elave edildi', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Bu Product artiq elave edilib!', 'status' => 'error']);
        }

    }


    public function postProductEdit(Request $request, $id)
    {
        try {
            Products::where('id', $request->id)->update(['name' => $request->name, 'real_price' => $request->real_price,
                'price' => $request->price, 'discount_price' => $request->discount_price,
                'count' => $request->count, 'real_count' => $request->count, 'brand_id' => $request->brands,
                'category_id' => $request->categoryes, 'status' => $request->status]);
            return response(['title' => 'Ugurlu', 'message' => 'Product update oldu!', 'status' => 'success']);


        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Product update olmadi!', 'status' => 'error']);
        }
    }

    public function postDeleteImageFromProduct(Request $request)
    {
        try {
            $product = Products::find($request->id);
            $prod_image='';
            foreach (explode('(xx)',$product->images) as $pimg){
                if($request->sekil!=base64_encode($pimg)){
                    $prod_image = $prod_image . $pimg . '(xx)';
                }
            }
            Products::where('id', $request->id)->update(['images' =>$prod_image]);
            return response(['title' => 'Ugurlu', 'message' => 'Product update oldu!', 'status' => 'success']);
        }catch (\Exception $exception){
            return response(['title' => 'Ugursuz!', 'message' => 'Product update olmadi!', 'status' => 'error']);
        }
    }


    public function postAddSlideshow(Request $request)
    {

        $slug = utf8_encode($request->title) . Carbon::now()->format('y-m-d-hh-mm-ss');
        if (isset($request->image)) {
            $validate = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            $logo = Input::file('image');
            $logo_uzanti = Input::file('image')->getClientOriginalExtension();
            $logo_ad = $slug . '.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('slideImg/slideshow/');
            Storage::disk('uploads')->put('slideImg/slideshow/' . $logo_ad, file_get_contents($logo));

            $slideshow = new Slideshow();
            $slideshow->url = $request->url;
            $slideshow->title = $request->title;
            $slideshow->description = $request->description;
            $slideshow->status = 1;
            $slideshow->image = file_get_contents($logo->getRealPath());
            $slideshow->save();
            return response(['title' => 'Ugurlu', 'message' => 'Slideshow elave olundu!', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Sekil secin!', 'status' => 'error']);
        }
    }


    public function postSlideshowEdit(Request $request)
    {
        $slug = utf8_encode($request->title . Carbon::now()->format('y-m-d-HH-mm-ss'));
        if (isset($request->image)) {
            $validate = Validator::make($request->all(), [
                'image' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            $logo = Input::file('image');
            $logo_uzanti = Input::file('image')->getClientOriginalExtension();
            $logo_ad = $slug . '.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('slideImg/slideshow/');
            Storage::disk('uploads')->put('slideImg/slideshow/' . $logo_ad, file_get_contents($logo));


        }

        try {
            unset($request['_token']);
            if (isset($request->image)) {
                unset($request->last_loqo);
                $logo_new = file_get_contents($logo->getRealPath());


                Slideshow::where('id', $request->id)->update(['title' => $request->title, 'description' => $request->description, 'status' => $request->status, 'image' => $logo_new]);
            } else {
                unset($request->image);
                Slideshow::where('id', $request->id)->update(['title' => $request->title, 'description' => $request->description, 'status' => $request->status]);

            }
            return response(['title' => 'Ugurlu!', 'message' => 'Slideshow update oldu', 'status' => 'success']);

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }

    }

    public function postDeleteMessage(Request $request)
    {
        try {
            ContactUs::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Mesaj Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesaji silmek olmur!', 'status' => 'error']);
        }

    }

    public function postDeleteBrand(Request $request)
    {
        try {
            Brands::where('id', $request->id)->delete();
            Products::where('brand_id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Brand Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Brand silmek olmur!', 'status' => 'error']);
        }

    }

    public function postDeleteCategory(Request $request)
    {
        try {
            Categoryes::where('id', $request->id)->delete();
            Products::where('category_id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Category Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Category silmek olmur!', 'status' => 'error']);
        }

    }

    public function PostDeleteSlideshow(Request $request)
    {
        try {
            Slideshow::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Slideshow Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Slideshow silmek olmur!', 'status' => 'error']);
        }
    }

    public function postDeleteMenu(Request $request)
    {
        try {
            Menu::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Menu Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Menu silmek olmur!', 'status' => 'error']);
        }

    }

    public function postDeleteProduct(Request $request)
    {

        try {
            Products::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Product silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Product silmek olmur!', 'status' => 'error']);
        }
    }

    public function postUserDelete(Request $request)
    {

        try {
            User::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'User Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'User silmek olmur!', 'status' => 'error']);
        }

    }

    public function postUserEdit(Request $request)

    {
        $slug = utf8_encode($request->title . Carbon::now()->format('y-m-d-HH-mm-ss'));
        if (isset($request->image)) {
            $validate = Validator::make($request->all(), [
                'image' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            $image = Input::file('image');
            $image_uzanti = Input::file('image')->getClientOriginalExtension();
            $image_ad = $slug . '.' . $image_uzanti;
            Storage::disk('uploads')->makeDirectory('userImg/users/');
            Storage::disk('uploads')->put('userImg/users/' . $image_ad, file_get_contents($image));
        }

        try {
            unset($request['_token']);
            if (isset($request->image)) {
                unset($request->last_image);
                $image_new = file_get_contents($image->getRealPath());


                User::where('id', $request->id)->update(['name' => $request->name, 'surname' => $request->surname, 'father_name' => $request->father_name,
                    'mobile' => $request->mobile, 'date_of_birth' => $request->date_of_birth, 'fb_profile' => $request->fb_profile, 'inst_profile' => $request->inst_profile, 'wp_profile' => $request->wp_profile,
                    'role_id' => $request->role_id, 'address' => $request->address, 'gender' => $request->gender, 'status' => $request->status, 'image' => $image_new]);
                return response(['title' => 'Ugurlu!', 'message' => 'User update oldu', 'status' => 'success']);
            } else {
                unset($request->image);
                User::where('id', $request->id)->update(['name' => $request->name, 'surname' => $request->surname, 'father_name' => $request->father_name,
                    'mobile' => $request->mobile, 'date_of_birth' => $request->date_of_birth, 'fb_profile' => $request->fb_profile, 'inst_profile' => $request->inst_profile, 'wp_profile' => $request->wp_profile,
                    'role_id' => $request->role_id, 'address' => $request->address, 'gender' => $request->gender, 'status' => $request->status,]);
                return response(['title' => 'Ugurlu!', 'message' => 'User update oldu', 'status' => 'success']);
            }


        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Update ugursuz alindi!', 'status' => 'error']);
        }

    }

    public function postAddUsers(Request $request)
    {

        try {
            $slug = utf8_encode($request->title . Carbon::now()->format('y-m-d-HH-mm-ss'));
            if (isset($request->image)) {
                $validate = Validator::make($request->all(), [
                    'image' => 'mimes:jpg,jpeg,png,gif',
                ]);

                if ($validate->fails()) {
                    return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
                }


                $image = Input::file('image');
                $image_uzanti = Input::file('image')->getClientOriginalExtension();
                $image_ad = $slug . '.' . $image_uzanti;
                Storage::disk('uploads')->makeDirectory('userImg/users/');
                Storage::disk('uploads')->put('userImg/users/' . $image_ad, file_get_contents($image));
            }

            $image_new = file_get_contents($image->getRealPath());

            if ($request->password == $request->retain_password) {
                $users = new User();
                $users->image = $image_new;
                $users->name = $request->name;
                $users->surname = $request->surname;
                $users->father_name = $request->father_name;
                $users->mobile = $request->mobile;
                $users->fb_profile = $request->fb_profile;
                $users->inst_profile = $request->inst_profile;
                $users->wp_profile = $request->wp_profile;
                $users->role_id = $request->role_id;
                $users->address = $request->address;
                $users->gender = $request->gender;
                $users->email = $request->email;
                $users->password = Hash::make($request->password);
                $users->date_of_birth = $request->date_of_birth;
                $users->status = 1;
                $users->save();
                return response(['title' => 'Ugurlu!', 'message' => 'User elave oldu', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Sifreler uyusmur!', 'status' => 'error']);
            }

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Add ugursuz alindi!', 'status' => 'error']);
        }

    }

    public function postDeleteOurTeam(Request $request)
    {

        try {
            OurTeam::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Profil Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Profili silmek olmur!', 'status' => 'error']);
        }

    }

    public function postBlogsEdit(Request $request, $id)
    {
        try {
            Blogs::where('id', $request->id)->update(['header' => $request->header, 'description' => $request->description,
                'category_id' => $request->blog_category, 'status' => $request->status]);
            return response(['title' => 'Ugurlu', 'message' => 'Blog update oldu!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Blog update olmadi!', 'status' => 'error']);
        }
    }

    public function postDeleteBlogs(Request $request)
    {
        try {
            Blogs::where('id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Blog ugurlu Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Blogu silmek olmur!', 'status' => 'error']);
        }
    }


    public function postDeleteBlogCategory(Request $request)
    {
        try {
            BlogCategory::where('id', $request->id)->delete();
            Blogs::where('category_id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Blog Category Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Blog Category silmek olmur!', 'status' => 'error']);
        }

    }


    public function postOurTeamEdit(Request $request)
    {
        try {
            OurTeam::where('id', $request->id)->update(['user_id' => $request->user_id, 'our_team_role_id' => $request->our_team_role_id, 'description' => $request->description]);
            return response(['title' => 'Ugurlu!', 'message' => 'Our Team update oldu', 'status' => 'success']);

        } catch (\Exception$exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Our Team update alinmadi', 'status' => 'error']);
        }


    }

    public function postDeleteOurTeamRoles(Request $request)
    {

        try {
            OurTeamRoles::where('id', $request->id)->delete();
            OurTeam::where('our_team_role_id', $request->id)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Our Team Role Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Our Team Role silmek olmur!', 'status' => 'error']);
        }

    }

    public function postOrdersDelete(Request $request)
    {
        try {
            $basket = Basket::where(['user_id' => $request->user_id, 'slug' => $request->slug])->where('status', '<>', 4)->get();
            foreach ($basket as $b) {
                $product = Products::find($b->product_id);
                $product->real_count = $product->real_count + $b->product_count;
                $product->save();
            }
            Orders::where(['users_id' => $request->user_id, 'slug' => $request->slug])->delete();
            Basket::where(['user_id' => $request->user_id, 'slug' => $request->slug])->where('status', '<>', 1)->delete();
            return response(['title' => 'Ugurlu!', 'message' => 'Order Silindi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Order silmek mumkun olmadi', 'status' => 'error']);
        }
    }


    public function postOurTeamRolesEdit(Request $request)
    {

        try {
            OurTeamRoles::where('id', $request->id)->update(['name' => $request->name]);
            return response(['title' => 'Ugurlu!', 'message' => 'Our Team Roles update oldu', 'status' => 'success']);

        } catch (\Exception$exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Our Team Roles  silmek olmur!', 'status' => 'error']);
        }

    }

    public function postMessage(Request $request)
    {
        try {
            Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . $request->answer], function ($message) use ($request) {
                $message->to($request->email, $request->full_name)->subject($request->subject);
                $message->from('ugurphp@mail.ru', 'Turan Shopping MMC');
            });
            return response(['title' => 'Ugurlu!', 'message' => 'Mesaj gonderildi', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Mesaj gonderilmedi, Email duz deyil ve ya internet baglantisi yoxdur!', 'status' => 'error']);
        }

    }


    public function postOrdersEdit(Request $request, $id)
    {
        try {
            if ($request->submitSend != null) {
                $orders = Orders::find($id);
                Orders::where(['users_id' => $request->user_id, 'slug' => $orders->slug])->update(['status' => 2]);
                Basket::where(['user_id' => $request->user_id, 'status' => 2, 'slug' => $orders->slug])->update(['status' => 3]);
                $user = User::find($request->user_id);
                Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . 'Sizin mehsulunuz gonderilib!'], function ($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Orders');
                    $message->from('ugurphp@mail.ru', 'Turan Shopping MMC');
                });
                return response(['title' => 'Ugurlu!', 'message' => 'Orders emaile gonderildi', 'status' => 'success']);

            } elseif ($request->submitDelivered != null) {
                $orders = Orders::find($id);
                Orders::where(['users_id' => $request->user_id, 'slug' => $orders->slug])->update(['status' => 3]);
                Basket::where(['user_id' => $request->user_id, 'status' => 3, 'slug' => $orders->slug])->update(['status' => 4]);
                $user = User::find($request->user_id);
                Mail::send('emails.mesaj_gonder', ['msg' => 'Message: ' . 'Sizin mehsulunuz catib!'], function ($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Orders');
                    $message->from('ugurphp@mail.ru', 'Turan Shopping MMC');
                });


                $basket = Basket::where(['user_id' => $request->user_id, 'status' => 4, 'slug' => $orders->slug])->get();
                foreach ($basket as $b) {
                    $date = Carbon::now();
                    $slug = $request->product_id . $date->format('Y-m-d:H:d:s');
                    $product = Products::find($b->product_id);
                    $reports = new Reports();
                    $reports->product_id = $product->id;
                    $reports->profit = ($product->discount_price - $product->real_price) * $b->product_count;
                    $product->save();
                    $reports->slug = $slug;
                    $reports->save();
                }

                return response(['title' => 'Ugurlu!', 'message' => 'Orders emaile gonderildi', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Orders emaile gonderilmedi!', 'status' => 'error']);
            }

        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => $exception->getMessage(), 'status' => 'error']);
        }

    }


    public function postAddBlogs(Request $request)
    {
        $date = Carbon::now()->format('y-m-d-HH-dd-ss');
        $slug = $request->name . $date;

        $sekiller = $request->file('images');
        $prod_image = '';

        if (!empty($sekiller)) {
            $i = 0;

            $validate = Validator::make($request->all(), [
                'images.*' => 'mimes:jpg,jpeg,png,gif',
            ]);

            if ($validate->fails()) {
                return response(['title' => 'Ugursuz!', 'message' => 'Sekil formati jpg,jpeg,png,gif  olmalidir!', 'status' => 'error']);
            }


            foreach ($sekiller as $sk) {

                $sekil_uzanti = $sk->getClientOriginalExtension();
                $sekil_ad = $i . '.' . $sekil_uzanti;
                Storage::disk('uploads')->makeDirectory('blogImg/blogs/' . $slug);
                Storage::disk('uploads')->put('blogImg/blogs/' . $slug . '/' . $sekil_ad, file_get_contents($sk));
                $prod_image = $prod_image . file_get_contents($sk) . '(xx)';
                $i++;

            }
        }


        $blogs = Blogs::where('header', $request->header)->first();
        if ($blogs == null) {
            $blogs = new Blogs();
            $blogs->author = Auth::user()->id;
            $blogs->header = $request->header;
            $blogs->description = $request->description;
            $blogs->slug = $slug;
            $blogs->status = 1;
            $blogs->category_id = $request->blog_category;
            $blogs->images = $prod_image;
            $blogs->save();
            return response(['title' => 'Ugurlu', 'message' => 'Blog Elave edildi', 'status' => 'success']);
        } else {
            return response(['title' => 'Ugursuz!', 'message' => 'Bu Blog artiq elave edilib!', 'status' => 'error']);
        }
    }


    public function postAddBlogCategory(Request $request)
    {
        try {
            $blog_category = BlogCategory::where('name', $request->name)->first();
            if ($blog_category == null) {
                $date = Carbon::now()->format('Y-m-d:H:d:s');
                $blog_category = new BlogCategory();
                $blog_category->name = $request->name;
                $blog_category->slug = $request->name . $date;
                $blog_category->status = 1;
                $blog_category->save();
                return response(['title' => 'Ugurlu', 'message' => 'Blog Category elave olundu!', 'status' => 'success']);
            } else {
                return response(['title' => 'Ugursuz!', 'message' => 'Bu Blog Category artiq elave edilib!', 'status' => 'error']);
            }
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Blog Category elave olmadi!', 'status' => 'error']);
        }
    }

    public function postBlogCategoryEdit(Request $request, $id)
    {
        try {
            BlogCategory::where('id', $request->id)->update(['name' => $request->name, 'status' => $request->status]);
            return response(['title' => 'Ugurlu', 'message' => 'Blog Category update oldu!', 'status' => 'success']);
        } catch (\Exception $exception) {
            return response(['title' => 'Ugursuz!', 'message' => 'Blog Category update olmadi!', 'status' => 'error']);
        }
    }

    public function postMonthlyReport(Request $request)
    {
        $from = Carbon::parse($request->from_date)->format('Y-m-d');
        $to = Carbon::parse($request->to_date)->format('Y-m-d');
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        $reports = DB::select(DB::raw("SELECT sum(profit) as profit,created_at FROM online_shopping.reports
         where created_at BETWEEN '" . $from . "' and '" . $to . "' GROUP BY created_at"));

        return view('admin.monthly_report')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'reports' => $reports, 'comments' => $comments, 'setting' => $setting]);
    }


}
