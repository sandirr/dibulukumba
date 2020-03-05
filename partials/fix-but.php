<!-- button menu tambahan -->
<div class="fixed-action-btn mt" id="mt">
    <a class="aw btn-floating blue accent-2 pulse">
        <i class="large material-icons">menu</i>
    </a>
    <ul>
        <li>
            <a class="btn-floating green" href="hubungi.php">
                <i class="material-icons">message</i>
            </a></li>
        <li>
            <a target="_blank" class="btn-floating pink darken-3" href="https://api.whatsapp.com/send?phone=+6282290001995">
                <i class="material-icons ">record_voice_over</i>
            </a>
        </li>
        <li>
            <a class="btn-floating orange darken-3" href="#fix-oe">
                <i class="material-icons ">hotel</i>
            </a>
        </li>
        <li>
            <a class="btn-floating red" href="#fix-oi">
                <i class="material-icons">airplanemode_active</i>
            </a>
        </li>
    </ul>
</div>
<script>
    const aw = document.querySelector('.aw')
    setTimeout(function () {
        aw.classList.remove('pulse');
    }, 30000);
    
    aw.addEventListener('click', () => {
        aw.classList.remove('pulse');
    })
</script>