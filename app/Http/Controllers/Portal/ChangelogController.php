<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class ChangelogController extends Controller
{
    /**
     * show_changelog - Show the chanelog from the Changelog.md file.
     *
     * @return void
     */
    public function show_changelog()
    {
        return view('pages.changelog');
    }
}
