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
use App\Menu;
use App\OurTeam;
use App\OurTeamRoles;
use App\Products;
use App\Roles;
use App\Setting;
use App\Slideshow;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeGetController extends Controller
{
    public function getSignIn()
    {
        $slide = Slideshow::where('status', 1)->get();
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();

        if (Auth::check()) {
            return redirect('/')->with(['menu' => $menu, 'setting' => $setting, 'slide' => $slide]);
        } else {
            return view('frontend.sign_in')->with(['menu' => $menu, 'setting' => $setting, 'slide' => $slide]);
        }
    }

    public function getSignUp()
    {
        $slide = Slideshow::where('status', 1)->get();
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        if (Auth::check()) {
            return redirect('/')->with(['menu' => $menu, 'setting' => $setting, 'slide' => $slide]);
        } else {
            return view('frontend.sign_up')->with(['menu' => $menu, 'setting' => $setting, 'slide' => $slide]);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function welcome()
    {
        $name = 'Rahim';
        return view('welcome')->with('ad', $name);
    }

    public function home()
    {
        // $menu=Menu::all();
        $slide = Slideshow::where('status', 1)->get();
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $products = Products::where('status', 1)->get();
        return view('frontend.index')->with(['menu' => $menu, 'setting' => $setting, 'slide' => $slide, 'products' => $products]);
    }

    public function getContact_us()
    {
        // $date=Carbon::now();
        //   dd('Ugur'. $date->format('Y-m-d:H:d:s'));
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        return view('frontend.contact_us')->with(['menu' => $menu, 'setting' => $setting]);


    }

    public function getSingleProduct($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $p = Products::find($id);
        $comment = Comments::where(['product_id' => $p->id, 'status' => 1])->get();
        $rew = $p->reviews + 1;
        $p->update(['reviews' => $rew]);
        return view('frontend.single_product')->with(['menu' => $menu, 'setting' => $setting, 'p' => $p, 'comment' => $comment]);

    }

    public function getBlogs()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $blogs = Blogs::all();
        $blog_category = BlogCategory::all();
        $about_us = AboutUs::all();
        return view('frontend.blogs')->with(['menu' => $menu, 'setting' => $setting,
            'blog_category' => $blog_category, 'blogs' => $blogs, 'about_us' => $about_us]);
    }

    public function getSingleBlog($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $blogs = Blogs::find($id);
        $blogs_comments = BlogsComments::where(['blog_id' => $blogs->id, 'status' => 1])->get();
        return view('frontend.single_blog')->with(['menu' => $menu, 'setting' => $setting, 'blogs_comments' => $blogs_comments, 'blogs' => $blogs,]);
    }


    public function getBrands()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $brands = Brands::where('status', 1)->get();
        return view('frontend.brands')->with(['menu' => $menu, 'setting' => $setting, 'brands' => $brands]);

    }

    public function getBrandsProduct($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $products = Products::where('brand_id', $id)->get();
        return view('frontend.brands_products')->with(['menu' => $menu, 'setting' => $setting, 'products' => $products]);
    }

    public function getCategoryes()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $categoryes = Categoryes::where('status', 1)->get();
        return view('frontend.categoryes')->with(['menu' => $menu, 'setting' => $setting, 'categoryes' => $categoryes]);
    }

    public function getCategoryesProduct($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $products = Products::where('category_id', $id)->get();
        return view('frontend.categoryes_products')->with(['menu' => $menu, 'setting' => $setting, 'products' => $products]);
    }


    public function getCategoryesBlogs($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $blogs = Blogs::where('category_id', $id)->get();
        return view('frontend.categoryes_blogs')->with(['menu' => $menu, 'setting' => $setting, 'blogs' => $blogs]);
    }

    public function getAboutUs()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $about_us = AboutUs::find(1);
        $our_team = OurTeam::all();
        return view('frontend.about_us')->with(['menu' => $menu, 'setting' => $setting, 'our_team' => $our_team, 'about_us' => $about_us]);

    }


    public function getOurTeam()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $our_team = OurTeam::all();
        $our_team_roles = OurTeamRoles::all();
        return view('frontend.our_team')->with(['menu' => $menu, 'setting' => $setting, 'our_team_roles' => $our_team_roles, 'our_team' => $our_team]);
    }

    public function getMyProfile()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $roles = Roles::find(1);
        return view('frontend.my_profile')->with(['menu' => $menu, 'setting' => $setting, 'roles' => $roles]);
    }

    public function getMyBasket()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $basket = Basket::where('user_id', Auth::user()->id)->where('status', 1)->get();
        $total_payment = 0;
        foreach ($basket as $b) {
            $total_payment = $total_payment + $b->payment;
        }
        return view('frontend.my_basket')->with(['menu' => $menu, 'setting' => $setting, 'total_payment' => $total_payment, 'basket' => $basket]);
    }

    public function getPurchasedGoods()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $basket = Basket::where('user_id', Auth::user()->id)->where('status', '<>', 1)->get();
        $wait_payment = 0;
        $send_payment = 0;
        $delivery_payment = 0;
        foreach ($basket as $b)
            if ($b->status == 2) {
                $wait_payment += $b->payment;
            } elseif ($b->status == 3) {
                $send_payment += $b->payment;
            } elseif ($b->status == 4) {
                $delivery_payment += $b->payment;
            }
        return view('frontend.purchased_goods')->with(['menu' => $menu, 'basket' => $basket, 'wait_payment' => $wait_payment,
            'send_payment' => $send_payment, 'delivery_payment' => $delivery_payment, 'setting' => $setting]);

    }

    public function getCheckOut()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $my_basket = Basket::where(['user_id' => Auth::user()->id, 'status' => 1])->get();
        $total_price = 0;
        foreach ($my_basket as $mb) {
            $total_price += $mb->payment;
        }
        return view('frontend.check_out')->with(['menu' => $menu, 'total_price' => $total_price, 'my_basket' => $my_basket, 'setting' => $setting]);
    }

    public function getMyBasketEdit($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $basket = Basket::find($id);
        return view('frontend.my_basket_edit')->with(['menu' => $menu, 'setting' => $setting, 'basket' => $basket]);
    }


    public function getChangePassword()
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        return view('frontend.change_password')->with(['menu' => $menu, 'setting' => $setting]);

    }


    public function getBlogsUser($id)
    {
        $setting = Setting::find(1);
        $menu = Menu::where('status', 1)->get();
        $user = User::find($id);
        return view('frontend.blogs_user')->with(['menu' => $menu, 'setting' => $setting, 'user' => $user]);
    }


}

