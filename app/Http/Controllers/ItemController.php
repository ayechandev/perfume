<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
    public function listItem()
    {


        $items = Item::all();
        $categories = Category::all();

        // dd($items);

        return view('item.list-item', ['items' => $items, 'categories' => $categories]);
    }

    public function createItem(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                "category_id" => "required",
                "name"        => "required",
                "photo"       => "required",
                "price"       => "required",
                "qty"       => "required",
                "gender"       => "required",
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // dd($request->category_id);

        $item = new Item();
        $item->category_id = request()->category_id;

        $item->name   = request()->name;

        if ($request->hasfile('photo')) {
            $file       = $request->file('photo');
            $name       = $file->getClientOriginalName();
            $extension  = $file->getClientOriginalExtension();

            $file->move('images/item/', $name);

            $item->photo = $name;
        } else {
            $item->photo = '';
        }

        $item->price = request()->price;
        $item->qty = request()->qty;
        $item->gender = request()->gender ?: 'unsex';
        $item->status = request()->status;
        $item->remark = request()->remark;



        $item->save();

        return back()->with('add_info', 'New Item added Successfully!');
    }

    public function deleteItem()
    {
        $id = request()->id;
        Item::find($id)->delete();
        return redirect('/admin/item/list')->with('del_info', 'Item Deleted Successfully!');
    }

    public function updItem()
    {
        $id = request()->id;
        $item = Item::find($id);
        $category = Category::all();
        return view('item.upd-item', [
            'item' => $item,
            'category' => $category
        ]);
    }

    public function updateItem(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                // "name"        => "required",

                // "price"       => "required",
                // "qty"       => "required",
                // "gender"       => "required",
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // dd($request->category_id);

        $item = Item::find(request()->id);

        $item->category_id = request()->category_id;
        $item->name   = request()->name;

        if ($request->hasfile('photo')) {
            $file       = $request->file('photo');
            $name       = $file->getClientOriginalName();
            $extension  = $file->getClientOriginalExtension();

            $file->move('images/item/', $name);

            $item->photo = $name;
        } else {
            $item->photo = '';
        }

        $item->price = request()->price;
        $item->qty = request()->qty;
        $item->gender = request()->gender ?: 'unsex';
        $item->status = request()->status;
        $item->remark = request()->remark;

        // dd($item);



        $item->save();

        return redirect('/admin/item/list')->with('upd_info', 'Item updated Successfully!');
    }
}
