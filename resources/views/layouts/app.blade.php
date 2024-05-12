<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Iframe</title>
    <style>
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: none;
            /* Mulai tersembunyi */
        }

        #loading-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            /* Animasi putar */
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}" class="menu-link">Home</a></li>
            <li><a href="{{ route('about') }}" class="menu-link">About</a></li>
            <li><a href="{{ route('contact') }}" class="menu-link">Contact</a></li>
        </ul>
    </nav>

    <div id="loading-overlay">
        <div id="loading-spinner"></div>
    </div>
    <div id="tabMenu"></div>
    <div id="contentWrapper">
        <iframe src="{{ route('home') }}" id="iframeHome" class="iframeOpen" width="100%" height="400px" frameborder="0"></iframe>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#tabMenu').append(`<span class="span-menu" data-id-frame="iframeHome">Home</span> &nbsp;`);

            $('.menu-link').click(function(e) {
                e.preventDefault();
                var page = $(this).attr('href');
                var menuName = $(this).text();
                var idFrame = 'iframe' + menuName;



                if ($('#contentWrapper').find('#' + idFrame).length) {
                    $('.iframeOpen').hide();
                    $('#' + idFrame).show();
                    return false;
                }

                // Menampilkan elemen loading
                $('#loading-overlay').show();
                $('#contentWrapper').append(`<iframe src="${page}" id="${idFrame}" class="iframeOpen" width="100%" height="400px" frameborder="0"></iframe>`);
                $('.iframeOpen').hide();
                $('#' + idFrame).show();
                $('#' + idFrame).on('load', function() {
                    $('#loading-overlay').hide();
                });
                $('#tabMenu').append(`<span class="span-menu" data-id-frame="${idFrame}">${menuName}</span> &nbsp;`);
            });

            // Menyembunyikan elemen loading setelah iframe selesai dimuat
            // $('#content').on('load', function() {
            //     $('#loading-overlay').hide();
            // });

            $('#tabMenu').on('click', '.span-menu', function() {
                let idFrame = $(this).data('id-frame');
                $('.iframeOpen').hide();
                $('#' + idFrame).show();
            })
        });
    </script>
</body>

</html>