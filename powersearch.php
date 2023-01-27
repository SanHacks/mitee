<HTML>
<HEAD>
<title>PowerSearch</title>
<!--- Use bootstrap for styling, make search page with 3 tabs, one for each search type, use one search bar for all 3 tabs --->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.card {
    margin-top: 20px;
    margin-bottom: 20px;
    -webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
    box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
    border-radius: 2px;
    background-color: #fff;
    transition: all .3s ease-in-out;
    border: 1px solid #e5e5e5;
    margin-left: 20px;
    margin-right: 20px;
}

.card-body {
    padding: 15px;
}

.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}

.input-group-btn {
    position: relative;
    font-size: 0;
    white-space: nowrap;
    vertical-align: middle;
    display: table-cell;
}

.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    z-index: 2;
    margin-left: -1px;
}

.input-group-btn .btn {
    position: relative;
    z-index: 2;
    float: left;
}


.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.btn-default:hover {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}


.btn-default:focus, .btn-default.focus {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
    outline: 0;
    -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.125), 0 0 0 3px rgba(82,168,236,.5);
    box-shadow: inset 0 3px 5px rgba(0,0,0,.125), 0 0 0 3px rgba(82,168,236,.5);
}

.btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
    -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
    box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
}
</style>
</HEAD>

<body>
<div class="topnav">
  <a class="active" href="#home">PowerSearch</a>
  <a href="#news">Help</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
<div class="card">
    <div class="card-body">
        <div class="input-group">
            <!-- form submission handle by javascript -->
            <form action="javascript:search()">
                <input type="text" class="form-control" placeholder="Search for...">
            </form>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">I'm Feeling Lucky</button>
            </span>
        </div>
    </div>
</div>
<!---Tabs for each search type -->

    <!--- Container 3 tabs, placed side by side -->
    <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <ul class="nav nav-tabs">
        <li class="active" style="width: auto"><a data-toggle="tab" href="#home">Google</a></li>
        <li><a data-toggle="tab" href="#menu1">Bing</a></li>
        <li><a data-toggle="tab" href="#menu2">OpenAI</a></li>
      </ul>
    </div>
    </div>
    </div>
    <!--- Tab content -->
    <div class="container">
    <div class="row">
    <div class="col-sm-4">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Google</h3>

            <p>Some content in menu 1.</p>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Bing</h3>
            <p>Some content in menu 1.</p>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Duckduckgo</h3>
            <p>Some content in menu 2.</p>
        </div>
          <div id="menu3" class="tab-pane fade">
            <h3>Duckduckgo</h3>
            <p>Some content in menu 2.</p>
        </div>
    </div>
    </div>
    </div>
    </div>

</body>
</HTML>