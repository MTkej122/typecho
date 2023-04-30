(function ($) {
    $.extend({
        toast(params) {
            if ($('.j-message').length > 0) return;
            let messageType = {
                success: 'Success',
                warning: 'Warning',
                info: 'Info'
            };
            $('body').append(`
                <div class="j-message ${params.type || 'info'}">
                    <div class="icon icon-success">
                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M420.864 633.130667l422.378667-422.4a64 64 0 0 1 90.517333 90.517333l-467.626667 467.626667a64 64 0 0 1-90.517333 0L104.085333 497.386667A64 64 0 0 1 194.56 406.826667l226.282667 226.282666z" p-id="1786"></path>
                        </svg>
                    </div>
                    <div class="icon icon-warning">
                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 0a512 512 0 1 0 512 512A512 512 0 0 0 512 0z m0 862.72a58.368 58.368 0 1 1 56.32-57.856 57.344 57.344 0 0 1-56.32 57.856z m45.056-291.84c0 51.2-18.432 88.576-40.96 88.576h-8.192c-22.528 0-40.96-39.424-40.96-88.576l-25.088-352.256c0-48.64 18.432-88.064 41.472-88.064h57.344c23.04 0 41.472 39.424 41.472 88.064z" p-id="8533"></path>
                        </svg>
                    </div>
                    <div class="icon icon-info">
                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M196.67514 182.80936c-13.014372-12.406224-33.934672-12.406224-46.949044 0-13.014372 12.406224-13.014372 32.475116 0 44.75971L196.67514 272.45041c13.014372 12.406224 33.934672 12.406224 46.949043 0 13.014372-12.406224 13.014372-32.475116 0-44.75971l-46.949043-44.88134z m630.64972 0L780.375817 227.6907c-13.014372 12.406224-13.014372 32.475116 0 44.75971 12.892743 12.406224 33.934672 12.406224 46.949043 0l46.949044-44.75971c13.014372-12.406224 13.014372-32.475116 0-44.759711-12.892743-12.406224-33.934672-12.406224-46.949044-0.121629zM113.72372 433.609692h-66.409787c-18.366077 0-33.204894 14.230669-33.204894 31.623709 0 17.514669 14.838817 31.623708 33.204894 31.623708h66.409787c18.366077 0 33.204894-14.230669 33.204894-31.623708 0-17.514669-14.960447-31.623708-33.204894-31.623709z m862.962347 0h-66.409787c-18.366077 0-33.204894 14.230669-33.204894 31.623709 0 17.514669 14.838817 31.623708 33.204894 31.623708h66.409787c18.366077 0 33.204894-14.230669 33.204894-31.623708 0-17.514669-14.838817-31.623708-33.204894-31.623709zM478.855921 69.207269V132.576315c0 17.514669 14.838817 31.623708 33.204894 31.623709 18.366077 0 33.204894-14.230669 33.204894-31.623709V69.207269c0-17.514669-14.838817-31.623708-33.204894-31.623708-18.366077 0-33.204894 14.109039-33.204894 31.623708zM213.216772 512.790593C213.216772 670.179356 347.009384 797.890486 512.060815 797.890486 676.990616 797.890486 810.783228 670.179356 810.783228 512.790593c0-157.510393-133.792612-285.099893-298.722413-285.099893-165.051431 0-298.844043 127.5895-298.844043 285.099893z m232.434255 443.461693c0 17.514669 14.838817 31.623708 33.204894 31.623709h66.409788c18.366077 0 33.204894-14.230669 33.204893-31.623709 0-17.514669-14.838817-31.623708-33.204893-31.623708h-66.409788c-18.366077 0-33.204894 14.109039-33.204894 31.623708z m-66.409787-94.992754c0 17.514669 14.838817 31.623708 33.204894 31.623708h199.107732c18.366077 0 33.204894-14.230669 33.204894-31.623708 0-17.514669-14.838817-31.623708-33.204894-31.623708H412.446134c-18.366077-0.12163-33.204894 14.109039-33.204894 31.623708z m0 0" p-id="6794"></path>
                        </svg>
                    </div>
                    <div class="content">
                        <div class="title">${params.type ? messageType[params.type] : 'Info'}</div>
                        <div class="message">${params.message || '这是一条提示信息'}</div>
                    </div>
                </div>
            `);
            $('.j-message').css('top', $('.j-header').height() + 20);
            let timerShow = setTimeout(function () {
                $('.j-message').addClass('active');
                clearTimeout(timerShow);
                let timeHide = setTimeout(function () {
                    $('.j-message').removeClass('active');
                    clearTimeout(timeHide);
                    let timeRemove = setTimeout(function () {
                        $('.j-message').remove();
                        clearTimeout(timeRemove);
                    }, 500);
                }, 2500);
            }, 50);
        }
    });
})(jQuery);