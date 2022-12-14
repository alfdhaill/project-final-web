@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @can('isAdmin')
            <div class="h3 text-center mt-5">Welcome admin, {{ Auth::user()->name }}</div>
            @endcan
            @can('isUser')
            <div class="card bg-dark text-white">
                <div class="card-body mt-3">
                    <div class="card-title text-center h3 mt-2">Top 3 Most Liked Foods</div>
                    <table class="text-white table-dark table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Likes</th>
                                <th>Price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3 bg-dark text-white">
                <div class="card-body mt-3">
                    <div class="card-title text-center h3 mt-2">Top 3 Most Ordered Foods</div>
                    <table class="text-white table-dark table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Favorites</th>
                                <th>Price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3 bg-dark text-white">
                <div class="card-body mt-3">
                    <div class="card-title text-center h3 mt-2">Last Added Foods</div>
                    <table class="text-white table-dark table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Favorites</th>
                                <th>Price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
