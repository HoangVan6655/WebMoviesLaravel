<header id="header">
    <div class="container">
        <div class="row" id="headwrap">
            <div class="col-md-3 col-sm-6 slogan">
                <p class="site-title"><a class="logo" href="" title="phim hay "> Phim Hay</p>
                </a>
            </div>
            <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                <div class="header-nav">
                    <div class="col-xs-12">
                        <ul class="list-group search-result" id="result" style="display: none;"></ul>
                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <form id="search-form-pc" name="halimForm" role="search" action="{{ route('tim-kiem') }}" method="GET">
                                    <div class="form-group">
                                        <div class="input-group col-xs-12">
                                            <input id="timkiem" type="text" name="search" class="form-control"
                                                   placeholder="Tìm kiếm phim..." autocomplete="off" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-search" type="submit"><i class="fas fa-search"></i> Tìm Kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-xs">
                <div id="get-bookmark" class="box-shadow"><i class="hl-bookmark"></i><span> Bookmarks</span><span
                        class="count">0</span></div>
                <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                    <ul style="margin: 0;"></ul>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .btn-search {
        background-color: #000;
        color: #fff;
        border-color: #000;
    }

    .btn-search i {
        margin-right: 5px;
    }
</style>
