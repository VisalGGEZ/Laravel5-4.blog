@extends('layouts.frontend')

@section('title')
    {{$settings->site_name}} | Post
@stop

@section('content')
    <div class="row ">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{asset($single_post->featured)}}" alt="seo">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">Admin</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{$single_post->created_at->diffForHumans()}}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{route('category', ['id' => $single_post->category->id])}}">{{$single_post->category->name}}</a>
                            </span>

                        </div>

                        <div class="post__content-info">
                            {!! $single_post->content !!}
                        </div>

                        <br>

                        <div class="col-lg-12">
                            <aside aria-label="sidebar" class="sidebar sidebar-right">
                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @foreach($single_post->tags as $tag)
                                            <a href="{{route('tag', ['id' => $tag->id])}}"
                                               class="w-tags-item">{{$tag->tag}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{asset($single_post->user->profile->avatar)}}" alt="Author" class="img-circle"
                             height="100px" width="100px">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{$single_post->user->name}}</h5>
                        </div>
                        <p class="text">{{$single_post->user->profile->about}}</p>
                        <div class="socials">

                            <a href="#" class="social__item">
                                <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{asset('app/svg/google.svg')}}" alt="google">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                    @if($prev)
                        <a href="{{route('post.single', ['slug' => $prev->slug])}}" class="btn-prev-wrap">
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                            <div class="btn-content">
                                <div class="btn-content-title">Next Post</div>
                                <p class="btn-content-subtitle">{{$prev->title}}</p>
                            </div>
                        </a>
                    @endif

                    @if($next)
                        <a href="{{route('post.single', ['slug' => $next->slug])}}" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">Previous Post</div>
                                <p class="btn-content-subtitle">{{$next->title}}</p>
                            </div>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>

                    @include('includes.disqus')
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->
        </main>
    </div>

@stop

@section('addThis')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a388c8074e63479"></script>
@stop