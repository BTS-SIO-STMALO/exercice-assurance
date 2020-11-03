<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurance</title>
</head>
<body>
    <h1>Calculer votre tarif d'assurance</h1>
    <form>
        <div>
            <label>Indiquez votre âge svp</label>
            <input type="number" name="age" placeholder="xx ans" required min="17" max="99">
        </div>
        <div>
            <label>Indiquez votre ancienneté de permis</label>
            <input type="number" name="anciennete-permis" placeholder="xx ans" required min="0">
        </div>
        <div>
            <label>Indiquez le nombre d'accidents responsables</label>
            <input type="number" name="accident" placeholder="xx accidents" min="0">
        </div>
        <div>
            <label>Indiquez votre ancienneté chez votre assureur</label>
            <input type="number" name="anciennete-assureur" placeholder="xx ans" min="0">
        </div>
        <button type="submit">Calculer le tarif</button>
    </form>
</body>
</html>