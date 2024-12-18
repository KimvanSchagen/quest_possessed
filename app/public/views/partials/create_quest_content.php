<div>
    <form action="/create-quest" method="post">
        <fieldset>
            <label for="name">Quest name</label>
            <input id="name" name="name" type="text" placeholder="Quest name" required/>
            <label for="description">Quest description</label>
            <input id="description" name="description" type="text" placeholder="Description" required/>
            <label data-tooltip="Public quests will be visible for all adventurers" data-placement="bottom">
                <input name="public" type="checkbox" role="switch" />
                Public quest*
            </label>
        </fieldset>
        <input type="submit" value="Next"/>
    </form>
</div>