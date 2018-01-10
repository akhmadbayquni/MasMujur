
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nama_valas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["kode_valas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["stok_valas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["avg_valas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["equivalen_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama_valas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama_valas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kode_valas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kode_valas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stok_valas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stok_valas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["avg_valas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["avg_valas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["equivalen_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["equivalen_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_v_valas_2_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_v_valas_2_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_v_valas_2_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_nama_valas_' + iSeqRow).bind('blur', function() { sc_form_v_valas_2_nama_valas__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_v_valas_2_nama_valas__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_v_valas_2_nama_valas__onfocus(this, iSeqRow) });
  $('#id_sc_field_kode_valas_' + iSeqRow).bind('blur', function() { sc_form_v_valas_2_kode_valas__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_v_valas_2_kode_valas__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_v_valas_2_kode_valas__onfocus(this, iSeqRow) });
  $('#id_sc_field_stok_valas_' + iSeqRow).bind('blur', function() { sc_form_v_valas_2_stok_valas__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_v_valas_2_stok_valas__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_v_valas_2_stok_valas__onfocus(this, iSeqRow) });
  $('#id_sc_field_avg_valas_' + iSeqRow).bind('blur', function() { sc_form_v_valas_2_avg_valas__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_v_valas_2_avg_valas__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_v_valas_2_avg_valas__onfocus(this, iSeqRow) });
  $('#id_sc_field_equivalen_' + iSeqRow).bind('blur', function() { sc_form_v_valas_2_equivalen__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_v_valas_2_equivalen__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_v_valas_2_equivalen__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_v_valas_2_id__onblur(oThis, iSeqRow) {
  do_ajax_form_v_valas_2_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_v_valas_2_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_v_valas_2_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_v_valas_2_nama_valas__onblur(oThis, iSeqRow) {
  do_ajax_form_v_valas_2_validate_nama_valas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_v_valas_2_nama_valas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_v_valas_2_nama_valas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_v_valas_2_kode_valas__onblur(oThis, iSeqRow) {
  do_ajax_form_v_valas_2_validate_kode_valas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_v_valas_2_kode_valas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_v_valas_2_kode_valas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_v_valas_2_stok_valas__onblur(oThis, iSeqRow) {
  do_ajax_form_v_valas_2_validate_stok_valas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_v_valas_2_stok_valas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_v_valas_2_stok_valas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_v_valas_2_avg_valas__onblur(oThis, iSeqRow) {
  do_ajax_form_v_valas_2_validate_avg_valas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_v_valas_2_avg_valas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_v_valas_2_avg_valas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_v_valas_2_equivalen__onblur(oThis, iSeqRow) {
  do_ajax_form_v_valas_2_validate_equivalen_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_v_valas_2_equivalen__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_v_valas_2_equivalen__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

