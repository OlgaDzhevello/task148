<?php
    if ($daysBefore === 0) {   // День рождения!
?>
       <article class="birthday">
            <h2 class="personal">Поздравляем с Днем рождения! </h2>
            <h3> Сегодня скидка 5% на все услуги</h3>
            <p class="description">
                Мы вас ценим!
            </p>
        </article>
    <?php
    }?>

<article class="birthday">
    <div>
        <h2 class="personal"> Внимание! </h2>
        <h2>Для вас персональное предложение - скидка на экскурсию - 50% </h2>
        <h3>До конца акции осталось: <span class="personal"><?=lostTime()?></span> </h3>
        <p class="description">
            Проведение времени на свежем воздухе и наслаждение природой способствует расслаблению
        </p>
    </div>
    <img src="https://unsplash.com/photos/Msr5x4_sBxI/download?force=true&w=600" 
        alt="экскурсия"
        title="https://unsplash.com/photos/Msr5x4_sBxI">
</article>
