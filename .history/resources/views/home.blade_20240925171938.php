@extends('layouts.app')

@section('content')
<div class="container">=
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#CreateCategoryModal">{{ __('Create Category') }}</button>
    @include('modal.category.create')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($categories as $category)
            <div class="card" style="margin-bottom: 25px;">
                <div class="card-header" style="background-color: rgb(0 0 0 / 16%);">
                    <div class="card-title fw-bold">{{ $course->title }}
                    </div>

                    @if (Auth::user()->role !== 'student')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#lessonModal-{{ $course->id }}">{{ __('Create Lesson') }}</button>
                        @include('modal.Lesson.createLesson')
                        <a href="{{ route('quizz.create', $course) }}"
                            class="btn btn-dark">{{ __('Create Quizz') }}</a>
                    @endif
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'instructor')
                        <a href="{{ route('quizz.show', $course) }}"
                            class="btn btn-dark">{{ __('Show Quizz') }}</a>
                    @endif
                    @can('enroll', [$isEnrolled, $course])
                        <a href="{{ route('quizz.show', $course) }}" class="btn btn-dark">{{ __('Show Quizz') }}</a>
                    @endcan
                </div>

                <div class="card-body">

                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
