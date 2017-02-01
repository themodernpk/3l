 $(document).ready(function () {

            $('.select2Container .select2').each(function () {
                $(this).select2();
            });
            $("body").on("click", ".btn-add", function (e) {
                e.preventDefault();

                $(this).removeClass('btn-add').attr('class', 'btn-del').html();

                var targetID = $(this).attr('data-target');
                var destinationID = $(this).attr('data-destination');
                console.log(targetID);
                var html = $(targetID).html();

                $(destinationID).append(html);

                $('.select2Container .select2').each(function () {
                    $(this).select2();
                });
                /*
                 Define the adapter so that it's reusable
                 */
                $.fn.select2.amd.define('select2/selectAllAdapter', [
                    'select2/utils',
                    'select2/dropdown',
                    'select2/dropdown/attachBody'
                ], function (Utils, Dropdown, AttachBody) {
                    function SelectAll() {
                    }

                    SelectAll.prototype.render = function (decorated) {
                        var self = this,
                            $rendered = decorated.call(this),
                            $selectAll = $(
                                '<button class="btn btn-xs btn-default" type="button" style="margin-left:6px;"><i class="fa fa-check-square-o"></i> Select All</button>'
                            ),
                            $unselectAll = $(
                                '<button class="btn btn-xs btn-default" type="button" style="margin-left:6px;"><i class="fa fa-square-o"></i> Unselect All</button>'
                            ),
                            $btnContainer = $('<div class="btn_container">').append($selectAll).append($unselectAll);
                        if (!this.$element.prop("multiple")) {
                            // this isn't a multi-select -> don't add the buttons!
                            return $rendered;
                        }
                        $rendered.find('.select2-dropdown').prepend($btnContainer);
                        $selectAll.on('click', function (e) {
                            var $results = $rendered.find('.select2-results__option[aria-selected=false]');
                            $results.each(function () {
                                self.trigger('select', {
                                    data: $(this).data('data')
                                });
                            });
                            self.trigger('close');
                        });
                        $unselectAll.on('click', function (e) {
                            var $results = $rendered.find('.select2-results__option[aria-selected=true]');
                            $results.each(function () {
                                self.trigger('unselect', {
                                    data: $(this).data('data')
                                });
                            });
                            self.trigger('close');
                        });
                        return $rendered;
                    };
                    return Utils.Decorate(
                        Utils.Decorate(
                            Dropdown,
                            AttachBody
                        ),
                        SelectAll
                    );
                });

            });



            $("body").on("click", ".btn-del", function (e) {
                e.preventDefault();
                var html = $(this).parent().parent().remove();
            });

        });

        $(document).ready(function () {
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#uplaod_dp").change(function () {
                readURL(this);
            });
        });

		$(document).ready(function () {
            $('.country option').each(function () {
                var a = $(this).text();
                $(this).attr('value', a);
            });
        });
        $("#uplaod_dp").change(function () {
            var fileExtension = ['jpg','jpeg','png','gif'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $('p.error').text("Only " + fileExtension.join(', ') + " formats are allowed");
                $('p.error').css('color','#B94A48');
                   $('p.error').css('font-size','14px');
                $("#uplaod_dp").uploadifyCancel(q);
                return false;
            }
        });



$(document).ready(function(){
    $('#filer_input').filer({
        showThumbs: true,
        addMore: true,
        allowDuplicates: false,
        appendTo: '.top_tag',
        extensions: ["jpg", "png", "gif"],
    });
});



$(document).ready(function () {
    $('#time_start').datetimepicker({
        format: "LT"
    });
    $('#time_end').datetimepicker({
            format: "LT"
        });
    // $("#time_start").on("dp.change", function (e) {
    //     $('#time_end').data("DateTimePicker").minDate(e.date);
    // });
    // $("#time_end").on("dp.change", function (e) {
    //     $('#time_start').data("DateTimePicker").maxDate(e.date);
    // });
});
