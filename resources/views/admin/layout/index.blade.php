<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Schedule</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('admin/assets/images/logos/logo.png')}}" />
  <link rel="stylesheet" href="{{asset('admin/assets/css/styles.min.css')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="{{asset('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&family=Roboto:wght@100;300&display=swap')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css')}}" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <div> 
      
        @include('admin.layout.sidebar')

    </div>
    <!--  Sidebar End -->
    
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.layout.header')
      <!--  Header End -->
    
      <div class="container-fluid">
        <!--  Row 1 -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
        @yield('content')
        @include('admin.layout.footer')
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            //const url = $(this).attr('href');
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            swal({
            title: "Anda Yakin Data dihapus?",
            text: "Jika yakin dihapus, data akan hilang selamanya",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
        });
  </script>

<script>
$( "#select" )
  .on( "change", function() {
    var str = "";
    $( "select option:selected" ).each( function() {
      return alert('Yes')
    } );
  } )
  .trigger( "change" );
</script>
<script>
  
$(function () {

// =====================================
// Profit
// ===================================== 

var chart = {

  series: [
    { name: "Earnings this month:", data: [355, 390, 300, 350, 390, 180, 355, 390] },
    { name: "Expense this month:", data: [280, 250, 325, 215, 250, 310, 280, 250] },
  ],

  chart: {
    type: "bar",
    height: 345,
    offsetX: -15,
    toolbar: { show: true },
    foreColor: "#adb0bb",
    fontFamily: 'inherit',
    sparkline: { enabled: false },
  },


  colors: ["#5D87FF", "#49BEFF"],


  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "35%",
      borderRadius: [6],
      borderRadiusApplication: 'end',
      borderRadiusWhenStacked: 'all'
    },
  },
  markers: { size: 0 },

  dataLabels: {
    enabled: false,
  },


  legend: {
    show: false,
  },


  grid: {
    borderColor: "rgba(0,0,0,0.1)",
    strokeDashArray: 3,
    xaxis: {
      lines: {
        show: false,
      },
    },
  },

  xaxis: {
    type: "category",
    categories: ["16/08", "17/08", "18/08", "19/08", "20/08", "21/08", "22/08", "23/08"],
    labels: {
      style: { cssClass: "grey--text lighten-2--text fill-color" },
    },
  },


  yaxis: {
    show: true,
    min: 0,
    max: 400,
    tickAmount: 4,
    labels: {
      style: {
        cssClass: "grey--text lighten-2--text fill-color",
      },
    },
  },
  stroke: {
    show: true,
    width: 3,
    lineCap: "butt",
    colors: ["transparent"],
  },

  
  tooltip: { theme: "light" },

  responsive: [
    {
      breakpoint: 600,
      options: {
        plotOptions: {
          bar: {
            borderRadius: 3,
          }
        },
      }
    }
  ]

};

var chart = new ApexCharts(document.querySelector("#chart2"), chart);
chart.render();
})
</script>
  <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
  <script src="{{asset('admin/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
  <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6e1b60fb-7351-451f-941c-ab0e266dfa4d";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>

</html>