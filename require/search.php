  <!-- search div -->
  <div id="popup" class="hidden">
    <div class="popup-content">
      <div class="search-bar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" action="/search">
        <input 
          id="search" 
          type="search" 
          name="find"
          aria-label="Search" aria-describedby="search-addon"
          placeholder="Search your pookie" 
          list="search-suggestions" 
          autocomplete="off"
        />
        <button class="searchbtn" type="submit">Search</button>
        </form>
        
        <datalist id="search-suggestions">
          <option value="Harun">
          <option value="Munsi">
          <option value="AmarWorld">
          <option value="Web Design">
        </datalist>
      </div>
    </div>
  </div>