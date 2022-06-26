var alertStyle = 'position: absolute;top: 10px;right: 10px;z-index: 99999;padding: 1rem 0.5rem!important; min-width:150px; max-width:500px;'

$('#modalDelete').on('show.coreui.modal', function(e) {
    let btn = $(e.relatedTarget);
    let modal = $(this);
    let id = btn.attr('data-id');
    let url = btn.attr('data-url');
    url = url.replace('%20', id);
    modal.find('form').attr('action', url);
})

function deleteData(form, datatable) {
    let modal = $('#modalDelete');

    formAjax(form, modal, function(data, status, jqxhr, form, modal) {
        modal.modal('hide')
        datatable.ajax.reload()
    })
}

function baseAjax(url, type, successCallback, param = null) {
    let intervalAjax
    let requestAjax
    try {
        $('#loading').css('display', 'block');
        intervalAjax = setInterval(function runAjax() {
            if (requestAjax != undefined && requestAjax != null) {
                if (requestAjax.readyState != 0 && requestAjax.readyState != 4) {
                    /**
                     * The xhr object also contains a readyState which contains the state of the 
                     * request(UNSENT-0, OPENED-1, HEADERS_RECEIVED-2, LOADING-3 and DONE-4). 
                     * we can use this to check whether the previous request was completed.
                     */
                    alert('Request dibatalkan, karna suatu alasan. Coba lagi dan pastikan internet Anda stabil!')
                    requestAjax.abort()
                    clearInterval(intervalAjax)
                    $('#loading').css('display', 'none');
                }
                if (requestAjax.readyState == 4) {
                    clearInterval(intervalAjax)
                }
            }
        }, 50 * 1000)

        requestAjax = $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: url,
            type: type,
            data: param,
            error: function(xhr) {
                error(xhr);
            },
            success: function(data) {
                $('#loading').css('display', 'none');
                if (intervalAjax != undefined && intervalAjax != null) {
                    clearInterval(intervalAjax)
                }
                if (typeof successCallback == 'function') {
                    successCallback(data);
                }
            }
        })
    } catch (error) {
        alert('Terjadi kesalahan saat menjalankan fitur ini, mohon coba lagi')
        console.error(error)
        $('#loading').css('display', 'none');
        if (intervalAjax != undefined && intervalAjax != null) {
            clearInterval(intervalAjax);
        }
        if (requestAjax != undefined && requestAjax != null) {
            requestAjax.abort()
        }
    }
}

function formAjax(form, modal = undefined, callbackSuccess, callBackSerialize = undefined, param = null) {
    let requestFormAjax
    let xhr
    try {
        $('#loading').css('display', 'block');

        intervalFormAjax = setInterval(function() {
            xhr = requestFormAjax.data('jqxhr')

            if (xhr != undefined && xhr != null) {
                if (xhr.readyState != 0 && xhr.readyState != 4) {
                    /**
                     * The xhr object also contains a readyState which contains the state of the 
                     * request(UNSENT-0, OPENED-1, HEADERS_RECEIVED-2, LOADING-3 and DONE-4). 
                     * we can use this to check whether the previous request was completed.
                     */
                    alert('Request dibatalkan, karna suatu alasan. Coba lagi dan pastikan internet Anda stabil!')
                    xhr.abort()
                    clearInterval(intervalFormAjax)
                    $('#loading').css('display', 'none');
                }
                if (xhr.readyState == 4) {
                    clearInterval(intervalFormAjax)
                }
            }
        }, 50 * 1000)
        requestFormAjax = form.ajaxSubmit({
            data: param,
            beforeSerialize: function($form, option) {
                if (typeof callBackSerialize == 'function') {
                    if (!callBackSerialize($form, option)) {
                        $('#loading').css('display', 'none');
                        return false;
                    }
                }
                return true;
            },
            error: function(xhr) {
                error(xhr);
            },
            success: function(data, status, jqxhr) {
                $('#loading').css('display', 'none');
                if (intervalFormAjax != undefined && intervalFormAjax != null) {
                    clearInterval(intervalFormAjax)
                }
                if (typeof callbackSuccess == 'function') {
                    if (modal == undefined) {
                        callbackSuccess(data, status, jqxhr, form)
                    } else {
                        callbackSuccess(data, status, jqxhr, form, modal)
                    }
                }
            }
        })
    } catch (error) {
        alert('Terjadi kesalahan saat menjalankan fitur ini, mohon coba lagi')
        console.error(error)
        $('#loading').css('display', 'none');
        if (intervalFormAjax != undefined && intervalFormAjax != null) {
            clearInterval(intervalFormAjax);
        }
        if (xhr != undefined && xhr != null) {
            xhr.abort()
        }
    }
}

function error(xhr) {
    $('#loading').css('display', 'none');
    if (intervalFormAjax != undefined && intervalFormAjax != null) {
        clearInterval(intervalFormAjax)
    }
    if (xhr.status == 500) {
        baseSwal('danger', 'Error!', 'Query error');
    } else if (xhr.status == 422) {
        let json = $.parseJSON(xhr.responseText)
        let message = ''
        if (json.errors != null) {
            message = '<ul class="text-left">'
            $.each(json.errors, function(index, value) {
                message += '<li>' + value + '</li>'
            })
            message += '</ul>'
        } else {
            message = json.message;
        }
        baseSwal('danger', 'Error!', message);
    } else if (xhr.status == 404) {
        baseSwal('danger', 'Error!', 'Halaman tidak ditemukan');
    } else if (xhr.status == 400) {
        baseSwal('danger', 'Error!', xhr.responseText);
    } else if (xhr.status == 501) {
        baseSwal('danger', 'Error!', $.parseJSON(xhr.responseText).message);
    }
}

function baseSwal(type = 'warning', title, message, timer = 5000) {
    var html = `<div class="alert alert-${type} alert-dismissible fade show" role="alert" style="${alertStyle}">`
    if (title != undefined) {
        html += `<div class="fw-bold">` + title != undefined ? title : '' + `</div>`
    }
    html += `${message}` +
        `<button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>` +
        `</div>`

    var body = $(document).find('.wrapper');
    body.append(html);
    setTimeout(function() {
        $(document).find('.alert-dismissible.fade.show').remove();
    }, timer)
}