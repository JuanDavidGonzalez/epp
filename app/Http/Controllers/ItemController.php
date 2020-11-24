<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $item = null;
        return view('items.create', compact( 'item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            //'rule' => 'required',
            'specification' => 'required',
            'code' => 'required|unique:items',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('items', 'public');
        $request->request->add(['img'=> $path]);

        Item::create($request->all());
        return redirect()->route('item.index')->with('success', 'Item creado correctamente!!');
    }

    public function edit(Item $item)
    {
        return view('items.create', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            //'rule' => 'required',
            'specification' => 'required',
            'code' => [
                'required',
                Rule::unique('items')->ignore($item->id)
            ],
            'image' => 'image'
        ]);

        if($request->file('image')) {
            $path = $request->file('image')->store('items', 'public');
            $request->request->add(['img' => $path]);
        }

        $item->update($request->all());

        return redirect()->route('item.index')->with('success', 'Item editado correctamente');
    }

}
