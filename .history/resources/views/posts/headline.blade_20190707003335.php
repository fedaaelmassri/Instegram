@extends('layouts.default')

@section('title', "posts")


@section('headline')

                @foreach($posts as $post)

                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    {{ $post->title }}
					</span>
					
					@endforeach


		

@endsection
@section('featurepost')


                <div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{ asset('storage/'.$posts[0]['image']) }});">
						<a href="{{ route('posts.view', ['id' => $posts[0]['id']]) }}" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        @foreach($posts[0]->categories as $category)

							<a href="{{ route('posts.view', ['id' => $category->id]) }}" class="  dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2 ">
					{{ $category->title }}
                            {{-- {{ $posts[0]['categories']['title'] }}--}}     
                                               </a>
                                               @endforeach

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="{{ route('posts.view', ['id' => $posts[0]['id']]) }}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {{ $posts[0]['title'] }}								
 
                            </a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									Jack Sims
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									{{$posts[0]['created_at']}}
								</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url({{ asset('storage/'.$posts[1]['image']) }});">
								<a href="{{ route('posts.view', ['id' => $posts[1]['id']]) }}"  class="dis-block how1-child1 trans-03">
                                {{ $posts[1]['title'] }}								

                                </a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                    
                                @foreach($posts[1]->categories as $category)

							<a href="{{ route('posts.view', ['id' => $category->id]) }}" class="  dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2 ">
					{{ $category->title }}
                                               </a>
                                               @endforeach
									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('posts.view', ['id' => $posts[1]['id']]) }}"  class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                        {{ $posts[1]['title'] }}								
                                    		</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{ asset('storage/'.$posts[2]['image']) }});">
								<a href="blog-detail-01.html" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                @foreach($posts[2]->categories as $category)

         <a href="{{ route('posts.view', ['id' => $category->id]) }}" class="  dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2 ">
           {{ $category->title }}
                   </a>
                   @endforeach

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('posts.view', ['id' => $posts[2]['id']]) }}"  class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{ $posts[2]['title'] }}									
                                    </a>
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{asset('storage/'.$posts[3]->image) }});">
								<a href="blog-detail-01.html" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                @foreach($posts[3]->categories as $category)

                          <a href="{{ route('posts.view', ['id' => $category->id]) }}" class="  dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2 ">
                 {{ $category->title }}
                   </a>
                   @endforeach

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('posts.view', ['id' => $posts[3]['id']]) }}"  class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{ $posts[3]['title'] }}						
                                    			</a>
										</a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
@section('category')

	<!-- Entertainment -->
    <div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl12 tab01-title">
                                    Categories
 								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">All</a>
									</li>
                                @foreach($categories as $cat)
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab-{{$cat->id}}" role="tab">
                                            {{$cat->title}}
                                        </a>
									</li>
									@endforeach
									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
                          	<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab2-1" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/'.$posts[0]['image']) }}" width="750" height="540" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                         {{$posts[0]['title']}}
                                                     </a>
													</h5>

													<span class="cl8">
                                                    @foreach($posts[0]->categories as $category)

														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                      {{$category->title}}
                                                           </a>
                                                       @endforeach
														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															{{$posts[0]->created_at}}
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->	
                                            @foreach($posts as $key => $post)
                                            @if($key > 0)

											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/'.$post->image) }}" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{$post->title}}
														</a>
													</h5>

													<span class="cl8">
                                                    @foreach($post->categories as $category)

														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															{{$category->title}}
														</a>
                                                       @endforeach
														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
                                                        {{$post->created_at}}
														</span>
													</span>
												</div>
                                            </div>
                                            
                                            @endif
											@endforeach
											
											
										</div>
									</div>
								</div>
                                <!-- - -->
                                @foreach($categories as $cat)

								<div class="tab-pane fade" id="tab-{{$cat->id}}" role="tabpanel">
									<div class="row">
                                    @foreach (App\Category::all() as  $categoryid)
                                           @if($categoryid->id==$cat->id)
                                           @foreach($categoryid->posts  as $key => $post)
                                           @if($key == 0)
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="{{asset('storage/'.$post->image) }}" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        {{$post->title}}
                                                    </a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Finance
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>
                                        @endif
                                       
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->	
                                            @if($key !=0  )

											<div class="flex-wr-sb-s m-b-30">

												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="{{asset('storage/'.$post->image) }}" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{$post->title}}
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Small Business
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
                                                </div>

                                            </div>
                                            @endif

                                        </div>
                                     
                                        @endforeach
                                        @endif
                                        @endforeach
									</div>
								</div>
                                @endforeach

								<!-- - -->
                                </div>
							</div>
    
						
@endsection