<?php
namespace Amranidev\ScaffoldInterface\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use Amranidev\ScaffoldInterface\Scaffold;
use Amranidev\ScaffoldInterface\Scaffoldinterface;
use App\Http\Controllers\Controller;
use Request;
use Session;
use URL;

class GuiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $scaffold = Scaffoldinterface::paginate(6);
        return view('app', compact('scaffold'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = Request::except('_token');
        $object = new Scaffold($data);

        $object->Migration();
        $object->Model();
        $object->Views();
        $object->Controller();
        $object->Route();

        $scaffold = new Scaffoldinterface();
        $scaffold->migration = $object->paths->MigrationPath();
        $scaffold->model = $object->paths->ModelPath();
        $scaffold->controller = $object->paths->ControllerPath();
        $scaffold->views = $object->paths->DirPath();
        $scaffold->tablename = $object->names->TableName();
        $scaffold->save();

        Session::flash('status', $object->names->TableName() . ' Created successfuly To complete your scaffold. you must add to your terminal $: php artisan migrate');

        return redirect('scaffold');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $scaffold = Scaffoldinterface::FindOrFail($id);
        unlink($scaffold->migration);
        unlink($scaffold->model);
        unlink($scaffold->controller);
        unlink($scaffold->views . '/index.blade.php');
        unlink($scaffold->views . '/create.blade.php');
        unlink($scaffold->views . '/show.blade.php');
        unlink($scaffold->views . '/edit.blade.php');
        rmdir($scaffold->views);
        $scaffold->delete();

        Session::flash('status', 'Removed');

        return URL::to('scaffold');
    }

    /**
     * Delete confirmation message
     */
    public function deleteMsg($id)
    {
        $scaffold = Scaffoldinterface::FindOrFail($id);
        $msg = Ajaxis::Mtdeleting('Warning!!', 'Are you sure you want to Rollback ' . $scaffold->tablename . ' by rollbacking "' . $scaffold->tablename . '" . be sure that you rollback ' . $scaffold->tablename . ' from database. and avoid to keep routes recoureces', '/scaffold/guirollback/' . $id);
        if (Request::ajax()) {
            return $msg;
        }
    }
}
