// This is where all the translations go for every language
// Language switcher v2.0 Dynamic Content Replacer

// For forwards compatibility with older versions of the scorer, just add "languageInit();version=versionText" at the end of this file.
// Note that the line "langs=[XXX]" has no effect in old versions of the scorer and will just be ignored. To update the language list in old versions, copy that line to the equivalent place in index.html

// Universal

versionNum = "2.2"
versionDay = 10
versionMonth = 10
versionYear = 2020
versionText = ""

//langs=['en:United States:English','pt:Brazil:Portugues','de:Germany:Deutsche','es:Spain:Español','sk:Slovakia:Slovenský','nl:Netherlands:Nederlands','el:Greece:ελληνικά','hu:Hungary:Magyar','he:Israel:עִבְרִית‎','fr:France:français']
langs = ['en:United States:English']
    //  langs=['en:United States:English','es:Spain:Español','pt:Brazil:Portugues','de:Germany:Deutsche','el:Greece:ελληνικά','tr:Turkey:Türk','ro:Romania:Română','nl:Netherlands:Nederlands','hu:Hungary:Magyar','it:Italy:Italiano']

monthNames = []

// Default Language (English/en)

function languageInit() {
    translatorCredit = ""

    yes = "Yes"
    no = "No"
    partly = "Partly"
    completely = "Completely"
    resetText = "Reset"
    saveText = "Save" // As verb
    saveNText = "Save" // As noun
    savescoreText = "Save Score"
    loadsaveText = "Load Score No."
    deletesaveText = "Delete All Saved Scores"
    importsaveText = "Import Shared Scores"
    exportsaveText = "Share Scores"
    signin = "Sign in with"
    signout = "Sign out of"
    GoogleCreate = "Create New Spreadsheet"
    GoogleOpen = "Open Google Spreadsheet"
    created = "Created"
    savedto = "Saved to"
    dateText = "Date/Time"
    totalText = "Total Points"
    savedText = "Saved"
    loadedText = "Loaded"

    monthNames = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    improvementText = "Score History"
    scorerText = "Scorer"
    timersText = "Timers"
    savesText = "Saves"
    startText = "Start"
    stopText = "Stop"
    pointsText = "Points"

    sketchTitle = "Strategy Planner"
    drawingsText = "Saved Drawings"
    saveDrawingText = "Save Drawing"
    deleteSavedDrawingsText = "Delete All Saved Drawings"
    loadSavedDrawingText = "Load Saved Drawing"
    exportSavedDrawingsText = "Share Drawings"
    importSavedDrawingsText = "Import Shared Drawings"
    exportPNGText = "Export Drawing as PNG"

    doneText = "Completed"

    timerText = "Timer:"
    stopwatchText = "Stopwatch:"

    undefinedText = "undefined"

    versionText = versionNum + " - " + versionDay + " " + monthNames[versionMonth] + " " + versionYear


    improvement = improvementText

    window.monthNames = monthNames
}

languageInit()
version = versionText