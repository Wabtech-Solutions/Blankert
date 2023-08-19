<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class SatestiekController extends Controller
{
    public function update(Request $request)
    {
        $maandVorig = $request->input('maandVorig');
        if (!empty($maandVorig)) {
        DB::table('statestieken')->update(['maandVorig' => $maandVorig]);
        }

        $bezettingsgraad2week = $request->input('bezettingsgraad2week');
        if (!empty($bezettingsgraad2week)) {
        DB::table('statestieken')->update(['bezettingsgraad2week' => $bezettingsgraad2week]);
        }$bezettingsgraadVorigeWeek = $request->input('bezettingsgraadVorigeWeek');
        if (!empty($bezettingsgraadVorigeWeek)) {
        DB::table('statestieken')->update(['bezettingsgraadVorigeWeek' => $bezettingsgraadVorigeWeek]);
        }$bezettingsgraadHuidigWeek = $request->input('bezettingsgraadHuidigWeek');
        if (!empty($bezettingsgraadHuidigWeek)) {
        DB::table('statestieken')->update(['bezettingsgraadHuidigWeek' => $bezettingsgraadHuidigWeek]);
        }

        $bezettingsgraadHuidigMaand = $request->input('bezettingsgraadHuidigMaand');
        if (!empty($bezettingsgraadHuidigMaand)) {
        DB::table('statestieken')->update(['bezettingsgraadHuidigMaand' => $bezettingsgraadHuidigMaand]);
        }

        $aantalAuto = $request->input('aantalAuto');
        if (!empty($aantalAuto)) {
        DB::table('statestieken')->update(['aantalAuto' => $aantalAuto]);
        }
        $wagenpark2 = $request->input('wagenpark2');
        if (!empty($wagenpark2)) {
        DB::table('statestieken')->update(['wagenpark2' => $wagenpark2]);
        }
        $bezettingsgraad = $request->input('bezettingsgraad');
        if (!empty($bezettingsgraad)) {
        DB::table('statestieken')->update(['bezetting' => $bezettingsgraad]);
        }
        return redirect()->back()->with('statestiekMessage', 'Statestieken zijn succesvol aangepast!');
    }

    public function updateFocus(Request $request)
    {
        $focus2 = $request->input('focus2');
        if (!empty(' ')) {
        DB::table('statestieken')->update(['focus2' => $focus2]);
        }
        $focus3 = $request->input('focus3');
        if (!empty(' ')) {
        DB::table('statestieken')->update(['focus3' => $focus3]);
        }
        $focus1 = $request->input('focus1');
        if (!empty(' ')) {
        DB::table('statestieken')->update(['focus1' => $focus1]);
        }
        return redirect()->back()->with('statestiekMessage', 'Statestieken zijn succesvol aangepast!');

    }
}
