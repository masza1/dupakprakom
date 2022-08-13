var alertStyle = 'position: fixed;top: 10px;right: 10px;z-index: 9999999;padding: 1rem 0.5rem!important; min-width:150px; max-width:500px;'
var _isRequest = false;
$('#modalDelete').on('show.coreui.modal', function(e) {
    let btn = $(e.relatedTarget);
    let modal = $(this);
    let id = btn.attr('data-id');
    let url = btn.attr('data-url');
    url = url.replace('%20', id);
    modal.find('form').attr('action', url);
})

function deleteData(form, datatable = undefined, callback) {
    let modal = $('#modalDelete');
    formAjax(form, modal, function(data, status, jqxhr, form, modal) {
        modal.modal('hide')
        if (data.datatable != undefined || data.datatable != null) {
            if (typeof callback == 'function') {
                callback(data)
            }
        } else {
            datatable.ajax.reload()
        }
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
                    _isRequest = false;
                    clearInterval(intervalAjax)
                    $('#loading').css('display', 'none');
                }
                if (requestAjax.readyState == 4) {
                    clearInterval(intervalAjax)
                    _isRequest = false
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
                    _isRequest = false
                }
                if (typeof successCallback == 'function') {
                    successCallback(data);
                }
            }
        })
        _isRequest = true
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
        return requestFormAjax = form.ajaxSubmit({
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
        let json = xhr.responseJSON
        let message = ''
        if (json.errors != null) {
            message = '<ul class="text-left">'
            $.each(json.errors, function(index, value) {
                console.log(value)
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
    }else{
        baseSwal('danger', 'Error!', $.parseJSON(xhr.responseText).message);
    }
}

function baseSwal(type = 'warning', title, message, timer = 5000) {
    var html = `<div class="alert alert-${type} alert-dismissible fade show" role="alert" style="${alertStyle}">`
    if (title != undefined) {
        html += `<div class="fw-bold">` + title != undefined ? title : '' + `</div>`
    }
    html += `<br>${message}` +
        `<button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>` +
        `</div>`

    var body = $(document).find('.wrapper');
    body.append(html);
    setTimeout(function() {
        $(document).find('.alert-dismissible.fade.show').remove();
    }, timer)
}

function fillForm(parent = undefined, index = []) {
    if (parent != undefined) {
        let triggerTimer;
        let lastTrigger;
        $.each(index, function(index, value) {
            if (value.type == 'input' && value.withTrigger == undefined) { /* [{type:'input',data:value,content:element}] */
                parent.find(value.content).val(value.data)
            } else if (value.type == 'input' && value.withTrigger && value.mustTrigger) {
                $('#loading').css('display', 'block');
                let timer = setTimeout(function run() {
                    if (triggerTimer == undefined && !_isRequest && lastTrigger == undefined) {
                        $('#loading').css('display', 'none');
                        parent.find(value.content).val(value.data).trigger('change')
                        clearTimeout(timer)
                    } else {
                        timer = setTimeout(run, 500)
                    }
                }, 500)
            } else if (value.type == 'input' && value.withTrigger) {
                $('#loading').css('display', 'block');
                let timer = setTimeout(function run() {
                    if (triggerTimer == undefined && !_isRequest && lastTrigger == undefined) {
                        $('#loading').css('display', 'none');
                        parent.find(value.content).val(value.data)
                        clearTimeout(timer)
                    } else {
                        timer = setTimeout(run, 500)
                    }
                }, 500)
            } else if (value.type == 'select' && value.timer == undefined) { /* [{type:'select',data:value,content:element}] */
                parent.find(value.content).val(value.data).trigger('change')
            } else if (value.type == 'select' && value.timer != undefined && value.withTrigger == undefined) { /* [{type:'select',data:value,content:element,stop:true,timer:true}] */
                $('#loading').css('display', 'block');
                let timer = setTimeout(function run() {
                    if (parent.find(value.content + ' option').length > 1) {
                        parent.find(value.content).val(value.data).trigger('change')
                        clearTimeout(timer)
                        $('#loading').css('display', 'none');
                        triggerTimer = undefined;
                        lastTrigger = undefined;
                    } else {
                        triggerTimer = 'running';
                        lastTrigger = 'running';
                        timer = setTimeout(run, 500)
                    }
                }, 500)
            } else if (value.type == 'select' && value.timer != undefined && value.withTrigger) {
                $('#loading').css('display', 'block');
                let timer = setTimeout(function run() {
                    if (triggerTimer == undefined && !_isRequest) {
                        if (parent.find(value.content + ' option').length > 1) {
                            parent.find(value.content).val(value.data).trigger('change')
                            clearTimeout(timer)
                            lastTrigger = undefined;
                            $('#loading').css('display', 'none');
                        } else {
                            lastTrigger = 'running';
                            timer = setTimeout(run, 1000)
                        }
                    } else {
                        lastTrigger = 'running';
                        timer = setTimeout(run, 1000)
                    }
                }, 500)
            } else if (value.type == 'file' && value.addButton != undefined) {
                if (value.data != null && value.data != '') {
                    parent.find(value.content).append(`<button type="button" class="ms-2 btn btn-sm btn-primary view-file" data-src="${value.data}" title="Lihat File"><i class="fa fa-file-pdf"></i></button>`)
                }
            } else if (value.type == 'file' && value.plugins != undefined) { /* [{type:'file',data:value, content:'element',fname:'file name'}] */
                if (value.data != null && value.data != '') {
                    let src = publicURL + 'storage/' + value.data
                    resetPreview(parent.find(value.content), src, value.fname)
                } else {
                    resetPreview(parent.find(value.content), '', '')
                }
            } else if (value.type == 'textarea' && value.wysihtml5 == undefined) { /* [{type:'textarea',data:value,content:element}] */
                parent.find(value.content).text(value.data)
            } else if (value.type == 'textarea' && value.wysihtml5 != undefined) { /* [{type:'textarea',data:value,content:element,wysihtml5:true}] */
                parent.find(value.content).data('wysihtml5').editor.setValue(value.data)
            } else if (value.type == 'checkbox') { /* [{type:'checkbox',data:value,content:element}] */
                if (value.data) {
                    parent.find(value.content).prop('checked', true).trigger('change')
                } else {
                    parent.find(value.content).removeAttr('checked')
                }
            } else if (value.type == 'text') {
                parent.find(value.content).val(value.data)
            }
        })
    } else {
        if (container != undefined && content != undefined) {
            loaderAjax(container, content, false)
        }
        console.log('undefined parent');
    }
}

function resetForm(parent, index = []) {
    if (parent != undefined) {
        $.each(index, function(index, value) {
            if (value.type == 'select' && value.append == undefined && !value.isRemove) {
                parent.find(value.content).prop('selectedIndex', 0).trigger('change')
            } else if (value.type == 'select' && value.append != undefined) {
                parent.find(value.content).empty().append(value.append).trigger('change')
            } else if (value.type == 'select' && value.isRemove) {
                let select = parent.find(value.content)
                select.parent(value.group).find('.select2-container--default').remove()
            } else if (value.type == 'file') {
                resetPreview(parent.find(value.content), '', '')
            } else if (value.type == 'input' && value.isRemove) {
                parent.find(value.content).remove()
            } else if (value.type == 'input') {
                parent.find(value.content).val(value.data)
            }
        })
    } else {
        console.log('undefined parent')
    }
}