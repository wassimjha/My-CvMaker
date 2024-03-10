<?php
require_once 'vendor/autoload.php'; // Inclure l'autoloader de Dompdf

// Utiliser la classe Dompdf
use Dompdf\Dompdf;

// Créer une nouvelle instance de Dompdf
$dompdf = new Dompdf();

// Mise en mémoire tampon de la sortie PHP
ob_start();
// Inclure le fichier PHP contenant votre contenu à générer
include 'cvpdf.php';
// Récupérer le contenu mis en mémoire tampon dans une variable
$html = ob_get_clean();

// Charger le contenu HTML dans Dompdf
$dompdf->loadHtml($html);
// Spécifier le chemin de base pour les ressources (images)
$dompdf->setBasePath('C:\wamp64\www\projet_web');
// (Optionnel) Définir la taille et l'orientation du document PDF
$dompdf->setPaper('A3', 'portrait');

// Rendre le HTML en PDF
$dompdf->render();

// Envoyer le PDF au navigateur pour le téléchargement
$dompdf->stream('MyCV.pdf');
?>