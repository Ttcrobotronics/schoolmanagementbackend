@if(!empty(session('success')))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
</div>
@endif

@if(!empty(session('error')))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
</div>
@endif

@if(!empty(session('payment_error')))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('payment_error')}}
</div>
@endif

@if(!empty(session('warning')))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('warning')}}
</div>
@endif

@if(!empty(session('info')))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    {{session('info')}}
</div>
@endif

@if(!empty(session('secondary')))
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    {{session('secondary')}}
</div>
@endif

@if(!empty(session('primary')))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{session('primary')}}
</div>
@endif

@if(!empty(session('light')))
<div class="alert alert-light alert-dismissible fade show" role="alert">
    {{session('light')}}
</div>
@endif

<style>
@keyframes slideIn {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
.alert {
    animation: slideIn 0.5s ease-in-out;
}
</style>

<!-- <script>
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
        });
    }, 5000);
});
</script> -->
