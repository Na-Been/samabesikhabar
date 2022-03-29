<script src="{{asset('back/js/jquery.min.js')}}"></script>
<script src="{{asset('back/js/app.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<script type="text/javascript">
    $(function () {
        var current = window.location.href;
        $('#mainsidebar li a').each(function () {
            var $this = $(this);
            // if the current path is like this link, make it active
            if ($this.attr('href') == current) {
                $this.addClass('side-menu--active');
                // var li = $(this).parent();
                // var ul = li.parent();
                // var p = ul.parent();
                // p.addClass('menu-open');
            }
        })
    })
</script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>--}}
{{--<script>
    var route_prefix = "/filemanager";
</script>--}}

<!-- CKEditor init -->

{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>--}}


{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<style>
    .popover {
        top: auto;
        left: auto;
    }
</style>
<script>
    $(document).ready(function () {

        // Define function to open filemanager window
        var lfm = function (options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function (context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function () {

                    lfm({type: 'image', prefix: '/filemanager'}, function (lfmItems, path) {
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });

                }
            });
            return button.render();
        };

        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
        $('#summernote-editor').summernote({
            toolbar: [
                ['popovers', ['lfm']],
            ],
            buttons: {
                lfm: LFMButton
            }
        })
    });
</script>--}}

<script>
    $(document).ready(function () {
        $('#d-menu-bar').on('click', function () {
            $('.side-nav').toggleClass('sidebar-open')
        })
    })

</script>
@yield('js')
