@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Edit Notice</h3>
            </div>


        </div>



        <!-- Form -->

        <div class="form-wrapper">


            <form action="{{ route('notices.update', $notice->id) }}" method="POST">


                @csrf

                @method('PUT')



                <div class="form-group">


                    <label>
                        Title
                    </label>


                    <input type="text" name="title" value="{{ old('title', $notice->title) }}" placeholder="Enter title">


                    @error('title')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>





                <div class="form-group">


                    <label>
                        Description
                    </label>


                    <textarea name="description" rows="4" placeholder="Write description...">{{ old('description', $notice->description) }}</textarea>


                    @error('description')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>





                <div class="row">


                    <div class="form-group">


                        <label>
                            Publish Date
                        </label>


                        <input type="date" name="publish_date" value="{{ old('publish_date', $notice->publish_date) }}">



                        @error('publish_date')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror


                    </div>





                    <div class="form-group">


                        <label>
                            Expire Date
                        </label>


                        <input type="date" name="expire_date" value="{{ old('expire_date', $notice->expire_date) }}">



                        @error('expire_date')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror


                    </div>


                </div>






                <div class="form-group">


                    <label>
                        Created By
                    </label>


                    <input type="text" value="{{ $notice->creator->name ?? 'N/A' }}" disabled>


                </div>






                <div class="form-group">


                    <label>
                        Status
                    </label>


                    <select name="status">


                        <option value="1" {{ old('status', $notice->status) == 1 ? 'selected' : '' }}>

                            Active

                        </option>




                        <option value="0" {{ old('status', $notice->status) == 0 ? 'selected' : '' }}>

                            Inactive

                        </option>


                    </select>




                    @error('status')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>





                <div class="button-group">


                    <button type="submit" class="btn update-btn">

                        Update Notice

                    </button>




                    <a href="{{ route('notices.index') }}" class="btn back-btn">

                        Back

                    </a>


                </div>


            </form>


        </div>


    </div>
@endsection
