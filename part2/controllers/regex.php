<?php
/*******************création et déclaration des regex********************/
// regex pour les noms
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ ]+$/';
// regex pour du texte
$regexText = '/^[A-Za-z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ\,\;\:\!\?\.\%\$\€\=\)\(\-\"\'\#\[\]\°\+ ]+$/';
// regex pour la date
$regexDate = '/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/';
// regex pour l'email
$regexMail = '/^[A-Za-z0-9._%+-]+[@]{1}[A-Za-z0-9.-]+[.]{1}[A-Za-z]{2,4}$/';
// regex pour l'adresse
$regexAddress = '/^[A-Za-z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ\'\- ]+$/';
// regex pour le numéro de téléphone
$regexPhoneNumber = '/^[0-9]+$/';
// regex pour l'URL
$regexURL = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
// regex pour l'heure
$regexHour = '/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/';
?>