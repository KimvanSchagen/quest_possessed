<div>
    <h1>Stage <?php echo $stageNumber ?></h1>
    <form>
        <fieldset>
            <label for="name">Quest name</label>
            <input id="name" name="name" type="text" placeholder="Quest name" required/>
            <label for="description">Quest description</label>
            <input id="description" name="description" type="text" placeholder="Description" required/>
            <label for="achievement">Achievement points</label>
            <input id="achievement" name="achievement" type="number" placeholder="0" required/>
        </fieldset>
        <input type="submit" value="Next"/>
    </form>

</div>
