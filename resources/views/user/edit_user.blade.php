@extends('layout_user')
@section('content')
<section class="no-skin">
    <main>
        <section class="slider-area slider-area2">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">ユーザー情報</h1>
                                    <!-- breadcrumb Start-->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">ホーム</a></li>
                                            <li class="breadcrumb-item"><a href="{{ URL::to('users/' . auth()->user()->user_id . '/posts') }}">自分の投稿</a></li>
                                        </ol>
                                    </nav>
                                    <!-- breadcrumb End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="main-container ace-save-state" id="main-container">
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="hr dotted"></div>
                                <div>
                                    <div id="user-profile-3" class="user-profile row">
                                        <div class="col-sm-offset-1 col-sm-10">
                                            <div class="space"></div>
                                            <form class="form-horizontal" action="{{url('/users').'/'.Auth::user()->user_id.'/update'}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="tabbable">
                                                    <div class="tab-content profile-edit-tab-content">
                                                        <div id="edit-basic" class="tab-pane in active">
                                                            <h4 class="header blue bolder smaller">ユーザー情報</h4>

                                                            <div class="row">
                                                                @if ($user->avatar_url != null)
                                                                <div class="block-ava">
                                                                    <img src="{{ $user->avatar_url }}">
                                                                </div>
                                                                @else
                                                                <div class="block-ava">
                                                                    <img src="{{asset('/user/img/default_avt.jpg')}}">
                                                                </div>
                                                                @endif
                                                                <div class="col-xs-12 col-sm-4">
                                                                    <input type="file" name="avatar_url">
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-username">名前</label>

                                                                <div class="col-sm-9">
                                                                    <input type="text" id="form-field-username" placeholder="Username" name="username" value={{ $user->user_name }} disabled></br>
                                                                    <small>
                                                                        <span style="color:red">
                                                                            @error('username')
                                                                            {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="space"></div>
                                                            <h4 class="header blue bolder smaller">問い合わせ</h4>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-email">メール</label>

                                                                <div class="col-sm-9">
                                                                    <span>
                                                                        <input type="email" id="form-field-email" name="email" placeholder="example@gmail.com" value={{ $user->email }} disabled>
                                                                        <i class="ace-icon fa fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="space-4"></div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-website">アドレス</label>

                                                                <div class="col-sm-9">
                                                                    <span>
                                                                        <input type="text" id="form-field-website" name="address" placeholder="Address" value={{ $user->address }}>
                                                                        <i class="ace-icon fa fa-globe"></i>
                                                                    </span>
                                                                </div>
                                                            </div>


                                                            <div class="space-4"></div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-phone">電話番号</label>

                                                                <div class="col-sm-9">
                                                                    <span>
                                                                        <input class="input-medium input-mask-phone" type="text" id="form-field-phone" name="phone" placeholder="phone" value={{ $user->phone }}>
                                                                        <i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
                                                                    </span></br>
                                                                    <small>
                                                                        <span style="color:red">
                                                                            @error('phone')
                                                                            {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </small>
                                                                </div>
                                                            </div>

                                                            <div class="space-4"></div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-website">紹介文</label>

                                                                <div class="col-sm-9">
                                                                    <span>
                                                                        <input style=" height: 100px; width:70%" type="text" id="form-field-website" name="des" placeholder="description" value={{ $user->des }}>
                                                                    </span>
                                                                    <p><i>行を分割したい場合は、分の最後に「..」と入力してください。</i></p>
                                                                </div>
                                                            </div>

                                                            <div class="space"></div>

                                                            <h4 class="header blue bolder smaller">パスワード</h4>
                                                            <div id="edit-password" class="tab-pane">
                                                                <div class="space-10"></div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass0">現在パスワード</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" id="form-field-pass0" name="pass0">
                                                                    </div>
                                                                </div>

                                                                <div class="space-4"></div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">新しいパスワード</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" id="form-field-pass1" name="pass1">
                                                                    </div>
                                                                </div>

                                                                <div class="space-4"></div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">確認パスワード</label>

                                                                    <div class="col-sm-9">
                                                                        <input type="password" id="form-field-pass2" name="pass2">
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="clearfix form-actions">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button class="btn btn-info" type="submit">
                                                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                                                        保存
                                                                    </button>
                                                                    &nbsp; &nbsp;
                                                                    <button class="btn" type="reset">
                                                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                                                        リセット
                                                                    </button>

                                                                </div>
                                                            </div>
                                            </form>
                                        </div><!-- /.span -->
                                    </div><!-- /.user-profile -->
                                </div>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->
    </main>
</section>
@endsection