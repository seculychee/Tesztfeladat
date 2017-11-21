$(function(){

    $("#productForm").validate({
        rules: {
            picture: {
                required: true
            },
            name: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            picture: {
                required: 'Kérem válaszon egy képet a feltöltéshez!'
            },
            name: {
                required: 'Kérem adja meg a termék nevét!'
            },
            description: {
                required: 'Kérem adja meg a termék leírását'
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
    $("#productEditForm").validate({
        rules: {
            name: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Kérem adja meg a termék nevét!'
            },
            description: {
                required: 'Kérem adja meg a termék leírását'
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
    $("#login").validate({
        rules: {
            email: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: 'Adja meg az email címet!'
            },
            password: {
                required: 'Adja meg a jelszót!'
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
    $("#newAdmin").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            firstname: {
                required: 'Adja meg a vezetéknevét!'
            },
            lastname: {
                required: 'Adja meg a keresztnevét!'
            },
            email: {
                required: 'Adja meg az email címet!'
            },
            password: {
                required: 'Adja meg a jelszót!'
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
});