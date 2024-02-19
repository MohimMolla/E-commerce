<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    //public function index(Request $request)
    //{
    //    if ($request->ajax()) {
    //        return DataTables::of(Team::query())
    //            ->addIndexColumn()
    //            ->addColumn('action', function ($row) {

    //                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';

    //                $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';

    //                return $btn;
    //            })
    //            ->rawColumns(['action'])
    //            ->make(true);
    //    }

    //    return view('ajax-crud.all');
    //}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Team::query())
                ->addIndexColumn()
                ->addColumn('Action', function ($row) {
                    $btn = '<a href="javascript::void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost"> Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['Action'])
                ->make(true);
        }
        return view('ajax-crud.all');
    }
}
