<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\TeamIntro;
use App\Models\TeamLeader;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function team()
    {
        $teamIntro = TeamIntro::first();
        $teamleaders = TeamLeader::get();
        return view('backend.team.team', compact('teamIntro', 'teamleaders'));
    }

    public function teamIntroUpdate(Request $request)
    {
        $teamIntro = TeamIntro::first();

        $teamIntro->section_heading = $request->section_heading;
        $teamIntro->intro_description = $request->intro_description;
        $teamIntro->team_mamber_count = $request->team_mamber_count;
        $teamIntro->departments_count = $request->departments_count;
        $teamIntro->countries_count = $request->countries_count;

        $teamIntro->save();
        return redirect()->back();
    }

    public function teamLeaderStore(Request $request)
    {
        $teamleader = new TeamLeader();

        $teamleader->name = $request->name;
        $teamleader->position = $request->position;
        $teamleader->bio = $request->bio;
        $teamleader->email = $request->email;
        $teamleader->linkedin = $request->linkedin;
        $teamleader->twitter = $request->twitter;
        $teamleader->instagram = $request->instagram;
        $teamleader->github = $request->github;

        if (isset($request->image)) {
            $imageName = rand() . '-teamleader-' . '.' . $request->image->extension();
            $request->image->move('backend/images/teamleader/', $imageName);

            $teamleader->image = $imageName;
        }

        $teamleader->save();
        return redirect()->back();
    }

    public function teamLeaderUpdate(Request $request, $id)
    {
        $teamleader = TeamLeader::findOrFail($id);

        $teamleader->name = $request->name;
        $teamleader->position = $request->position;
        $teamleader->bio = $request->bio;
        $teamleader->email = $request->email;
        $teamleader->linkedin = $request->linkedin;
        $teamleader->twitter = $request->twitter;
        $teamleader->instagram = $request->instagram;
        $teamleader->github = $request->github;

        // Image Update
        if ($request->hasFile('image')) {

            // পুরাতন ছবি delete
            if ($teamleader->image && file_exists(public_path('backend/images/teamleader/' . $teamleader->image))) {
                unlink(public_path('backend/images/teamleader/' . $teamleader->image));
            }

            $imageName = rand() . '-teamleader.' . $request->image->extension();
            $request->image->move(public_path('backend/images/teamleader/'), $imageName);

            $teamleader->image = $imageName;
        }

        $teamleader->save();

        return redirect()->back()->with('success', 'Leader Updated Successfully');
    }
}
