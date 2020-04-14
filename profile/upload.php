<div id="containerUpload popupUpload" class="containerUpload popup">
  <div class="popupHeader popupGrid">
    <div class="popupTitle">
      <div class="popupContainerMain">
        <h2 class="title">Project Aanmaken</h2>
      </div>
    </div>
    <div class="popupButtons">
      <div class="popupContainerMain">
        <button class="popupCloseButton" type="button" name="button"><i class="fas fa-times"></i></button>
      </div>
    </div>
  </div>
  <div class="popupContent">
    <div class="uploadFileMenu">
      <div class="fileDescription">
        <button id="uploadFileMenuDescription" class="uploadFileMenuButton" type="button" name="button">Description</button>
      </div>
      <div class="fileOptions">
        <button id="uploadFileMenuOptions" class="uploadFileMenuButton" type="button" name="button">Options</button>
      </div>
      <div class="fileAdvanced">
        <button id="uploadFileMenuAdvanced" class="uploadFileMenuButton" type="button" name="button">Advanced</button>
      </div>
    </div>
    <nav id="uploadFileMenuContainerDescription" class="uploadFileMenuContainer">
      <div class="popupContainerMain">
        <div class="inputGroup">
          <p class="inputTitle">Naam:</p>
          <input class="inputBox" type="text" name="" value="" placeholder="Project naam" required>
        </div>
        <div class="inputGroup">
          <p class="inputTitle">Beschrijving:</p>
          <textarea class="inputTextArea" name="name" rows="8" cols="80" placeholder="Omschrijf jou project" required></textarea>
        </div>
      </div>
    </nav>
    <nav id="uploadFileMenuContainerOptions" class="uploadFileMenuContainer">
      <div class="popupContainerMain">
        <div class="inputGroup">
          <p class="inputTitle">Optie 1:</p>
          <input class="inputBox" type="text" name="" value="" placeholder="Optie 1">
        </div>
        <div class="inputGroup">
          <p class="inputTitle">Optie 2:</p>
          <input class="inputBox" type="text" name="" value="" placeholder="Optie 2">
        </div>
      </div>
    </nav>
    <nav id="uploadFileMenuContainerAdvanced" class="uploadFileMenuContainer">
      <div class="popupContainerMain">
        <div class="inputGroup">
          <p class="inputTitle">Advanced 1:</p>
          <input class="inputBox" type="text" name="" value="" placeholder="Advanced 1">
        </div>
        <div class="inputGroup">
          <p class="inputTitle">Advanced 2:</p>
          <input class="inputBox" type="text" name="" value="" placeholder="Advanced 2">
        </div>
      </div>
    </nav>
    <div class="uploadFileContainer">
      <div class="uploadFileButton">
        <div class="popupContainerMain">
          <button type="button" name="button">Kies Bestanden</button>
        </div>
      </div>
      <div class="containerUploadedFiles">

        <div class="uploadedFile">
          <div class="progress">
            <div class="fileName">
              <p>Filename.psd</p>
            </div>
            <div class="fileProgress">
              <progress value="70" max="100"></progress>
            </div>
          </div>
          <div class="fileTypeIcon">
            <i class="far fa-image"></i>
          </div>
          <div class="progressIcon">
            <i class="fas fa-times"></i>
          </div>
        </div>

        <div class="uploadedFile">
          <div class="progress">
            <div class="fileName">
              <p>Filename.psd</p>
            </div>
            <div class="fileProgress">
              <progress value="100" max="100"></progress>
            </div>
          </div>
          <div class="fileTypeIcon">
            <i class="far fa-image"></i>
          </div>
          <div class="progressIcon">
            <i class="fas fa-check"></i>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
