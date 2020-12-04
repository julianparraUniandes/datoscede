<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('orden','ASC')->get();
        return view('admin.menu.index',['menus'=> $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'name_en' => 'required|min:3',
            'link' => 'required|min:1',
            'target' => 'required',
            'orden' => 'required|min:1',
            'main_menu' => 'required',
            'top_menu' => 'required',
            'footer_menu' => 'required',
        ]);
        Menu::create([
            'name' => $request['name'],
            'name_en' => $request['name_en'],
            'link' => $request['link'],
            'target' => $request['target'],
            'orden' => $request['orden'],
            'main_menu' => $request['main_menu'],
            'top_menu' => $request['top_menu'],
            'footer_menu' => $request['footer_menu'],
            ]);   
        return redirect(route('menu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('admin.menu.show',['menu'=> $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|min:3',
            'name_en' => 'required|min:3',
            'link' => 'required|min:1',
            'target' => 'required',
            'orden' => 'required|min:1',
            'main_menu' => 'required',
            'top_menu' => 'required',
            'footer_menu' => 'required',
        ]);
        $menu->name = $request->name;
        $menu->name_en = $request->name_en; 
        $menu->link = $request->link;
        $menu->target = $request->target;  
        $menu->orden = $request->orden;
        $menu->main_menu = $request->main_menu; 
        $menu->top_menu = $request->top_menu; 
        $menu->footer_menu = $request->footer_menu;  
        $menu->save();
        return redirect()->route('menu.index')->with('success','Menú actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success','Menú eliminado.');
    }
}
