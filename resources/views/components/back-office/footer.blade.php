<footer class="main-footer">
    <strong>Copyright &copy;<span id="year"></span> <a href="{{ route('home') }}">NewsDirect</a>.</strong>
    All rights reserved.
</footer>
<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>
