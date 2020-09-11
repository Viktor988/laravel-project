<div id="futer">
<div id="ikonice">
   <a href=""> <i class="fab fa-instagram"></i></a>
   <a href=""> <i class="fab fa-facebook-f"></i></a>
    <a href=""><i class="fab fa-google-plus-g"></i></a>
        <a href=""> <i class="fab fa-twitter"></i></a>
</div>
<div id="linkautor">
<a href="{{asset('dokumentacija.pdf')}}">Dokumentacija /</a><a href="{{ url('/autor') }}"> Autor</a>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/jquery.lbslider.js')}}"  type="text/javascript"></script>
        @yield('skriptovi')
         <script type="text/javascript" src="{{asset('js/korpa.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/program.js')}}"></script>


    </body>
</html>
