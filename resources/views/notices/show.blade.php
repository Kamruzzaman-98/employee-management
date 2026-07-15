@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Notice Details</h3>
            </div>


            <a href="{{ route('notices.index') }}" class="back-btn btn">

                ← Back to List

            </a>


        </div>



        <!-- Details -->

        <div class="details-wrapper">


            <table class="details-table">


                <tr>

                    <td>
                        Title
                    </td>

                    <td>
                        {{ $notice->title }}
                    </td>

                </tr>



                <tr>

                    <td>
                        Description
                    </td>

                    <td>
                        {!! nl2br(e($notice->description)) !!}
                    </td>

                </tr>




                <tr>

                    <td>
                        Publish Date
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($notice->publish_date)->format('d M Y') }}
                    </td>

                </tr>





                <tr>

                    <td>
                        Expire Date
                    </td>

                    <td>

                        {{ $notice->expire_date ? \Carbon\Carbon::parse($notice->expire_date)->format('d M Y') : 'N/A' }}

                    </td>

                </tr>





                <tr>

                    <td>
                        Status
                    </td>

                    <td>

                        <span class="status {{ $notice->status ? 'active' : 'inactive' }}">

                            {{ $notice->status ? 'Active' : 'Inactive' }}

                        </span>

                    </td>

                </tr>





                <tr>

                    <td>
                        Created By
                    </td>

                    <td>
                        {{ $notice->creator->name ?? 'N/A' }}
                    </td>

                </tr>





                <tr>

                    <td>
                        Created At
                    </td>

                    <td>
                        {{ $notice->created_at->format('d M Y h:i A') }}
                    </td>

                </tr>





                <tr>

                    <td>
                        Updated At
                    </td>

                    <td>
                        {{ $notice->updated_at->format('d M Y h:i A') }}
                    </td>

                </tr>


            </table>


        </div>


    </div>
@endsection
