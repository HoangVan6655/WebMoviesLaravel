<header id="header">
    <div class="container">
        <div class="row" id="headwrap">

            <div class="col-md-6 col-sm-6 slogan">
                <p class="site-title">
                    <a class="logo" href="" title="phim hay "> Phim Hay </a>
                </p>
            </div>

            <div class="col-md-6 col-sm-6 halim-search-form hidden-xs">
                <div class="header-nav">
                    <div class="col-xs-12">
                        <ul class="list-group search-result" id="result" style="display: none;"></ul>
                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <form id="search-form-pc" name="halimForm" role="search"
                                      action="{{ route('tim-kiem') }}" method="GET">
                                    <div class="form-group">
                                        <div class="input-group col-xs-12">
                                            <input id="timkiem" type="text" name="search"
                                                   class="form-control rounded-10"
                                                   placeholder="Tìm kiếm phim..." autocomplete="off" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-search rounded-10 buttonSearch" type="submit"
                                                        style="left: 5px;">
                                                    <i class="fa fa-search"></i> Tìm Kiếm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

    .halim-search-form .form-control {
        border-radius: 5px !important;
    }

    .search-result {
        width: 95.6% !important;
    }

    .rounded-10 {
        height: 36px;
    }

    .buttonSearch {
        border-radius: 5px !important;
    }
</style>
