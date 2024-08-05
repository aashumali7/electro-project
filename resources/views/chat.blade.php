@extends('layouts.app')

@section('main')
<main id="content" role="main" class="container-fluid mt-5 mb-5" >
    <div class="card text-center chatCard">
            <div class="card-header bg-light text-left">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiPjxkZWZzPjxjaXJjbGUgaWQ9ImEiIGN4PSIyMCIgY3k9IjIwIiByPSIyMCIvPjxwYXRoIGlkPSJjIiBkPSJNMCAwaDMxLjY2N3YyMy4zMzNIMHoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48bWFzayBpZD0iYiIgZmlsbD0iI2ZmZiI+PHVzZSB4bGluazpocmVmPSIjYSIvPjwvbWFzaz48dXNlIGZpbGw9IiNGRkUxMUIiIGZpbGwtcnVsZT0ibm9uemVybyIgeGxpbms6aHJlZj0iI2EiLz48ZyBtYXNrPSJ1cmwoI2IpIj48ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSg1IDE2LjY2NykiPjxtYXNrIGlkPSJkIiBmaWxsPSIjZmZmIj48dXNlIHhsaW5rOmhyZWY9IiNjIi8+PC9tYXNrPjxwYXRoIGZpbGw9IiMwMjdDRDUiIGQ9Ik0yMS4zOTMgMTcuMTM1aDIuODc4YzEuMDcgMCAxLjc2LS43OTYgMi4wNzgtMi41ODQuMjk5LTEuNzE1LS4wOS0yLjQ4LTEuMTYzLTIuNDhoLTIuODgybC40NTUtMi41NzNjLjUwOC0yLjkzOCAyLjAxOC00LjM4OCA0LjUtNC4zODhoLjQ3M2MxLjM4IDAgMi4xMzQtLjIyOCAyLjI0LS44ODQuMDg1LS40NC0uMDM5LTEuMDQ3LS4xNzctMS43MTUtLjE0Ni0uNjUtLjMwMS0xLjI3OC0uNTIyLTEuNjNDMjguOTM5LjI4NiAyOC4xNzMgMCAyNi45NyAwYy0yLjk4IDAtNS40MzQuODM3LTcuMzY3IDIuNTMtMS45MjQgMS42ODItMy4xNTEgMy45NDQtMy42OTIgNy4wMTNsLS40NjIgMi41MjlIOS40MDJjLS4wOTcgMC02LjM0Ny43MDgtNi4zNDcuNzA4bDUuNzUzLjg4Ni4yMzIuODU0LTMuNTIxLjMgMy43MDEuNTQyLjE0Ni42OTUtMTEuMDMzLjYyczExLjkxLjQ1OCAxMi4wMDUuNDU4aDQuMTkybC0xLjA4MyA2LjE5OGg2Ljg3bDEuMDc2LTYuMTk4eiIgbWFzaz0idXJsKCNkKSIvPjwvZz48L2c+PC9nPjwvc3ZnPg==" />
            </div>
        <div class="card-body bg-white" style="min-height: 350px;">
            <span class="clearfix">
                <span class="badge text-white  float-left a_cc_chat bg-info mb-1">Hello</span>
            </span>
            <span class="clearfix">
                <span class="badge text-white float-right a_cc_chat bg-warning mb-1">Hii</span>
            </span>
        </div>
        <div class="card-footer text-body-secondary bg-white">
            <form id="chatForm">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-10">
                            <input type="text" class="chatInput form-control-lg w-100 rounded-0 border border-0" id="exampleFormControlInput1" placeholder="Write a Message">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-block btn-primary-dark-w px-5">Send
                                <i class="fa-brands fa-rocketchat"></i>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</main>
@endsection