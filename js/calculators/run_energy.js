function calculateRestoreTime() {
    const currentRunEnergy = parseInt(document.getElementById("currentRunEnergy").value);
    const agilityLevel = parseInt(document.getElementById("agilityLevel").value);
    
    // Calculate base recovery rate per 30 seconds
    const recovered = Math.floor(agilityLevel / 9) + 8;
    
    // Convert to energy restored per tick (50 ticks per 30 seconds)
    const recoveryPerTick = recovered / 50;
    
    // Calculate how many seconds it takes to restore 1% energy
    const secondsPerPercent = 0.6 / recoveryPerTick * 2;

    // Display time to restore 1% energy
    document.getElementById("restorePerPercent").textContent = `${secondsPerPercent.toFixed(2)} seconds`;

    // If the current Run Energy is already at 100%, no restoration time is needed
    if (currentRunEnergy >= 100) {
        alert("Run Energy is already at 100%.");
        return;
    }
    
    // Calculate energy to restore
    const energyToRestore = 100 - currentRunEnergy;

    // Calculate total restoration time
    const timeToRestoreInSeconds = energyToRestore * secondsPerPercent;
    
    const minutes = Math.floor(timeToRestoreInSeconds / 60);
    const seconds = Math.floor(timeToRestoreInSeconds % 60);
    
    let restoreTime = `${minutes} minutes and ${seconds} seconds`;
    document.getElementById("restoreTime").textContent = restoreTime;

    // Calculate percentage restored in 1 minute
    const restorePerSecond = 1 / secondsPerPercent; // energy restored per second
    const restoreInOneMinute = restorePerSecond * 60; // energy restored in 60 seconds

    // Display the percentage restored in 1 minute
    document.getElementById("restoreOneMinute").textContent = `${Math.min(restoreInOneMinute, 100).toFixed(0)}%`;
}