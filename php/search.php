<script src="js/main.js"></script>
<form class="searchbalk" action="resultaat.php">
    <div class="searchRow">
        <div class="inputWrapper down">
            <input type="text" name="land" id="landform" placeholder="Waarheen?">
        </div>
        
        <div class="inputWrapper">
        <div class="inputWrapper textWrapper">
            <p>Vertekken:</p>
        </div>
            <input type="date" name="vertrekdatum1" class="vertrekdatum" id="vertrek-datum" value="<?php echo date('Y-m-d'); ?>" required>
            <input type="date" name="vertrekdatum2" class="vertrekdatum" id="vertrek-datum2" value="<?php echo date('Y-m-d', strtotime('+1 Week')); ?>" required>
        </div>
        
        <div class="inputWrapper">
        <div class="inputWrapper  textWrapper">
            <p>Terugkomst:</p>
        </div>
            <input type="date" name="terugkomstdatum1" class="vertrekdatum" id="aankomst-datum" value="<?php echo date('Y-m-d', strtotime('+1 Week')); ?>" required>
            <input type="date" name="terugkomstdatum2" class="vertrekdatum" id="aankomst-datum2" value="<?php echo date('Y-m-d',strtotime('+2 Week')); ?>" required>
        </div>
        <div class="inputWrapper halfwidth nodisplay" id="no-display1" style="margin-right: 100px;">
            <p>Prijs:</p>
            <input type="number" name="minprijs" id="minimumpreis" placeholder="Min." value="1">
            <p>-</p>
            <input type="number" name="maxprijs" id="maximumpreis" max="10000" placeholder="Max." value="10000">
        </div>
        <div class="inputWrapper" id="submit-corner">
            <input type="submit" value="zoek" id="zoek-knop" onclick="return search()">
            <button id="expand-knop" onclick="return expand()">Filters</button>
        </div>

    </div>

</form>