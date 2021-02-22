@props(['type', 'message'])

<div {{ $attributes->merge(['class'=>'notification notification--'.$type]) }}>
    <div class="notification__image">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
        </svg>
    </div>
    <div class="notification__message">
        {{ $message }}
    </div>
    <div class="notification__close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
        </svg>
    </div>
</div>

<script>
    
    const notificationClose = document.querySelector('.notification__close');

    notificationClose.addEventListener('click', function() {
        const notification = document.querySelector('.notification');
        notification.style.display = 'none';
    })
</script>