/** File generated by Grunt -- do not modify
 *  JQUERY-FORM-VALIDATOR
 *
 *  @version 2.3.34
 *  @website http://formvalidator.net/
 *  @author Victor Jonsson, http://victorjonsson.se
 *  @license MIT
 */
!function (a, b) {
    "function" == typeof define && define.amd ? define(["jquery"], function (a) {
        return b(a)
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery)
}(this, function (a) {
    !function (a, b) {
        "use strict";
        a(b).bind("validatorsLoaded", function () {
            a.formUtils.LANG = {
                errorTitle: "Pengiriman Form Gagal!",
                requiredField: "Kolom ini harus diisi!",
                requiredFields: "Anda belum mengisi semua form yang dibutuhkan",
                badTime: "Format waktu belum benar",
                badEmail: "Alamat email yang dimasukkan tidak valid",
                badTelephone: "Nomor telepon yang dimasukkan tidak valid",
                badSecurityAnswer: 'You have not given a correct answer to the security question',
                badDate: 'Tanggal yang dimasukkan tidak sesuai',
                lengthBadStart: 'Nilai yang dimasukkan harus diantara ',
                lengthBadEnd: ' karakter',
                lengthTooLongStart: 'The input value is longer than ',
                lengthTooShortStart: 'The input value is shorter than ',
                notConfirmed: 'Input values could not be confirmed',
                badDomain: 'Incorrect domain value',
                badUrl: 'The input value is not a correct URL',
                badCustomVal: 'The input value is incorrect',
                andSpaces: ' and spaces ',
                badInt: 'The input value was not a correct number',
                badSecurityNumber: 'Your social security number was incorrect',
                badUKVatAnswer: 'Incorrect UK VAT Number',
                badStrength: 'The password isn\'t strong enough',
                badNumberOfSelectedOptionsStart: 'You have to choose at least ',
                badNumberOfSelectedOptionsEnd: ' answers',
                badAlphaNumeric: 'The input value can only contain alphanumeric characters ',
                badAlphaNumericExtra: ' dan ',
                wrongFileSize: 'Ukuran file yang Anda unggah terlalu besar (max %s)',
                wrongFileType: 'Only files of type %s is allowed',
                groupCheckedRangeStart: 'Please choose between ',
                groupCheckedTooFewStart: 'Please choose at least ',
                groupCheckedTooManyStart: 'Please choose a maximum of ',
                groupCheckedEnd: ' item(s)',
                badCreditCard: 'The credit card number is not correct',
                badCVV: 'The CVV number was not correct',
                wrongFileDim: 'Incorrect image dimensions,',
                imageTooTall: 'the image can not be taller than',
                imageTooWide: 'the image can not be wider than',
                imageTooSmall: 'the image was too small',
                min: 'min',
                max: 'max',
                imageRatioNotAccepted: 'Image ratio is not accepted'
            }
        })
    }(a, window)
});