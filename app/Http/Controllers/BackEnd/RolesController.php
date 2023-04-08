<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class RolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index( Request $request ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$roles = Role::all();

		return view( 'backend.roles.index', compact( 'roles' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$permission = Permission::get();
		return view( 'backend.roles.create', compact( 'permission' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$this->validate(
			$request,
			array(
				'role'       => 'required|unique:roles,title',
				'permission' => 'required',
			)
		);

		$role = Role::create( array( 'title' => $request->input( 'role' ) ) );

		$role->syncPermissions( $request->input( 'permission' ) );

		return redirect()->route( 'roles.index' )
			->with( 'success', 'Role created successfully' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show( Role $role ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		return $this->edit( $role );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Role $role ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$permissions = Permission::pluck( 'title', 'id' );
		$role->load( 'permissions' );

		return view( 'backend.roles.edit', compact( 'role', 'permissions' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$this->validate(
			$request,
			array(
				'role'       => 'required',
				'permission' => 'required',
			)
		);

		$role = Role::find( $id );
		$role->update( array( 'title' => $request->input( 'role' ) ) );
		$role->permissions()->sync( $request->input( 'permission', array() ) );

		return redirect()->route( 'roles.index' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Role $role ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$role->delete();

		return redirect()->route( 'roles.index' );
	}
}
