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
use App\Roles;
use App\Setting;
use App\Slideshow;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminGetController extends Controller
{
    public function home()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.index')->with(['messages' => $messages, 'setting' => $setting,
            'blogs_comments' => $blogs_comments, 'orders' => $orders, 'comments' => $comments]);
    }


    public function getMessages()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.messages')->with(['messages' => $messages, 'blogs_comments' => $blogs_comments, 'orders' => $orders, 'setting' => $setting, 'comments' => $comments]);
    }

    public function getMessage($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        $message = ContactUs::where('id', $id)->first();
        if ($message->read_unread == 0) {
            ContactUs::where('id', $id)->update(['read_unread' => 1]);
        }
        return view('admin.message')->with(['message' => $message, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'messages' => $messages,
            'setting' => $setting, 'comments' => $comments]);
    }


    public function getComments()
    {
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.comments')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getComment($id)
    {
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $comment = Comments::where('id', $id)->first();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.comment')->with(['comments' => $comments, 'orders' => $orders,
            'blogs_comments' => $blogs_comments, 'comment' => $comment, 'setting' => $setting, 'messages' => $messages]);
    }

    public function getBlogsComments()
    {
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.blogs_comments')->with(['messages' => $messages, 'orders' => $orders,
            'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getBlogsCommentsEdit($id)
    {
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $blogs_comments = BlogsComments::all();
        $blogs_comments_edit = BlogsComments::where('id', $id)->first();
        $orders = Orders::all();
        return view('admin.blogs_comments_edit')->with(['comments' => $comments, 'orders' => $orders,
            'blogs_comments' => $blogs_comments, 'blogs_comments_edit' => $blogs_comments_edit, 'setting' => $setting, 'messages' => $messages]);
    }


    public function getOrders()
    {
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.orders')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getOrdersEdit($id)
    {
        $orders_edit2 = Orders::where('id', $id)->first();
        if ($orders_edit2->status == 0) {
            Orders::where('id', $id)->update(['status' => 1]);
        }
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        $orders_edit = Orders::where('id', $id)->first();
        $basket = Basket::where(['user_id' => $orders_edit->users_id, 'slug' => $orders_edit->slug])->get();
        $total_price = 0;
        foreach ($basket as $b) {
            $total_price += $b->payment;
        }
        return view('admin.orders_edit')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'basket' => $basket,
            'total_price' => $total_price, 'orders_edit' => $orders_edit, 'comments' => $comments, 'setting' => $setting]);
    }


    public function getReports()
    {
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $orders = Orders::all();
        $reports = Reports::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.reports')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'reports' => $reports, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getMonthlyReport()
    {
        $setting = Setting::find(1);
        $comments = Comments::all();
        $messages = ContactUs::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        $reports = DB::select(DB::raw("SELECT sum(profit) as profit,created_at FROM online_shopping.reports GROUP BY created_at"));
        return view('admin.monthly_report')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'reports' => $reports, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getSetting()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.setting')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getMyProfile()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $roles = Roles::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.my_profile')->with(['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting, 'roles' => $roles]);

    }

    public function getChangePassword()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.change_password', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getMenu()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $menu = Menu::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.menu', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'menu' => $menu, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getMenuEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $menu = Menu::find($id);
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.menu_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'menu' => $menu, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getAddMenu()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_menu', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getBrands()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $brands = Brands::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.brands', ['messages' => $messages, 'orders' => $orders,
            'blogs_comments' => $blogs_comments, 'brands' => $brands, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getAddBrands()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_brand', ['messages' => $messages, 'orders' => $orders,
            'blogs_comments' => $blogs_comments, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getBrandEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $brand = Brands::find($id);
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.brand_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'brand' => $brand, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getCategoryes()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $categoryes = Categoryes::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.categoryes', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'categoryes' => $categoryes, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getAddCategoryes()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_categoryes', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'comments' => $comments, 'setting' => $setting]);

    }

    public function getCategoryesEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $categoryes = Categoryes::find($id);
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.categoryes_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'categoryes' => $categoryes, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getSlideshows()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $slideshows = Slideshow::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.slideshows', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'slideshows' => $slideshows, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getSlideshowEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $slideshow = Slideshow::find($id);
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.slideshow_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'slideshow' => $slideshow, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getAddSlideshow()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_slideshow', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'comments' => $comments, 'setting' => $setting]);

    }

    public function getProducts()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $products = Products::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.products', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'products' => $products, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getProductEdit($id)
    {
        $setting = Setting::find(1);
        $brands = Brands::all();
        $categoryes = Categoryes::all();
        $messages = ContactUs::all();
        $products = Products::find($id);
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.product_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'products' => $products, 'comments' => $comments, 'brands' => $brands, 'categoryes' => $categoryes, 'setting' => $setting]);

    }

    public function getAddProduct()
    {
        $setting = Setting::find(1);
        $brands = Brands::where('status', 1)->get();
        $categoryes = Categoryes::where('status', 1)->get();
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_product', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'comments' => $comments, 'brands' => $brands, 'categoryes' => $categoryes, 'setting' => $setting]);

    }


    public function getBlogs()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs = Blogs::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.blogs', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'blogs' => $blogs, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getAddBlogs()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        $blog_category = BlogCategory::where('status', 1)->get();
        return view('admin.add_blogs', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'blog_category' => $blog_category, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getBlogsEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs = Blogs::find($id);
        $blog_category = BlogCategory::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.blogs_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'blogs' => $blogs, 'blog_category' => $blog_category, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getBlogCategory()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blog_category = BlogCategory::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.blog_category', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'blog_category' => $blog_category, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getAddBlogCategory()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_blog_category', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'comments' => $comments, 'setting' => $setting]);
    }

    public function getBlogCategoryEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        $blog_category = BlogCategory::find($id);
        return view('admin.blog_category_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'blog_category' => $blog_category, 'comments' => $comments, 'setting' => $setting]);
    }


    public function getAboutUs()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $about_us = AboutUs::find(1);
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.about_us', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'about_us' => $about_us, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getUsers()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $users = User::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.users', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'users' => $users, 'comments' => $comments, 'setting' => $setting]);

    }


    public function getUserEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $users = User::find($id);
        $comments = Comments::all();
        $roles = Roles::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.user_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'roles' => $roles, 'users' => $users, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getAddUsers()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $roles = Roles::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_users', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'roles' => $roles, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getOurTeam()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $our_team = OurTeam::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.our_team', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'our_team' => $our_team, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getAddOurTeam()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $users = User::all();
        $our_team_rules = OurTeamRoles::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_our_team', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'users' => $users, 'our_team_rules' => $our_team_rules, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getOurTeamRoles()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $our_team_roles = OurTeamRoles::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.our_team_roles', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'our_team_roles' => $our_team_roles, 'comments' => $comments, 'setting' => $setting]);
    }

    public function getAddOurTeamRoles()
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.add_our_team_roles', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'comments' => $comments, 'setting' => $setting]);

    }


    public function getOurTeamEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $users = User::all();
        $our_team = OurTeam::find($id);
        $our_team_role_id = OurTeamRoles::all();
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.our_team_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'our_team_role_id' => $our_team_role_id, 'users' => $users, 'our_team' => $our_team, 'comments' => $comments, 'setting' => $setting]);

    }

    public function getOurTeamRolesEdit($id)
    {
        $setting = Setting::find(1);
        $messages = ContactUs::all();
        $our_team_roles = OurTeamRoles::find($id);
        $comments = Comments::all();
        $orders = Orders::all();
        $blogs_comments = BlogsComments::all();
        return view('admin.our_team_roles_edit', ['messages' => $messages, 'orders' => $orders, 'blogs_comments' => $blogs_comments,
            'our_team_roles' => $our_team_roles, 'comments' => $comments, 'setting' => $setting]);

    }


}
