library(readxl)
library(ggplot2)

# change this if the download path is different
path = "C:/Users/erudi/Downloads/Stress Data.xlsx"
frosch <- read_excel(path, sheet = "9")
smore <- read_excel(path, sheet = "10")
junior <- read_excel(path, sheet = "11")
senior <- read_excel(path, sheet = "12")
special <- read_excel(path, sheet = "Special")
stress_data <- read_excel(path, sheet = "Total")
cause_relief <- read_excel(path, sheet = "MC")

basic.stats <- function(df) {
  ave_stress <- mean(df$`Stress Level`)
  ave_sleep <- mean(df$Sleep)
  ap_pressure <- sum(df$`Class Pressure` == 1) / nrow(df)
  college_pressure <- sum(df$`College Pressure` == 1) / nrow(df)
  physical <- sum(df$`Physical Symptoms` == 1) / nrow(df)
  help <- sum(df$`Seek Help` == 1) / nrow(df)
  
  return(data.frame("average stress" = ave_stress, 
                    "average sleep" = ave_sleep, 
                    "AP pressure" = ap_pressure, 
                    "college pressure" = college_pressure,
                    "symptoms" = physical,
                    "seek help" = help))
  # return(c(ave_stress, ave_sleep, ap_pressure, college_pressure, physical, help))
}

school.usage <- function(df) {
  resources <- c('CCT', 'MIT', 'Achievement Center', 'Manifest', 'Guidance Counselors', 'Mental Health Specialists')
  category <- c('Heard of', 'Used', 'Effective')
  
  usage <- data.frame('CCT' = character(0), 
                      'MIT' = character(0),
                      'Achievement Center' = character(0),
                      'Manifest' = character(0),
                      'Guidance Counselors' = character(0),
                      'Mental Health Specialists' = character(0))
  for (c in category) {
    n <- numeric(6)
    for (r in c(1:length(resources))) {
      if (c == 'Heard of' && resources[r] == 'Achievement Center') {
        n[r] <- sum(df[[paste(c, "Achievement", sep = ' ')]] == 1) / nrow(df)
      } else {
        n[r] <- sum(df[[paste(c, resources[r], sep = ' ')]] == 1) / nrow(df)
      }
    }
    tmp <- data.frame(as.list(n))
    names(tmp) <- resources
    usage <- rbind(usage, tmp)
  }
  rownames(usage) <- category
  return(usage)
}

cause.relief.data <- function(df) {
  grades <- c(9, 10, 11, 12)
  
  return <- data.frame("HW Cause" = double(0), 
                       "College Cause" = double(0), 
                       "Parents Cause" = double(0), 
                       "Sports Cause" = double(0), 
                       "EC Cause" = double(0), 
                       "Test Cause" = double(0), 
                       "Social Cause" = double(0), 
                       "VG Relief" = double(0),
                       "Exercise Relief" = double(0), 
                       "Instrument Relief" = double(0), 
                       "Organized Relief" = double(0), 
                       "Art Relief" = double(0), "
                       Social Relief" = double(0), "
                       Sleep Relief" = double(0))
  for (g in grades) {
    i <- which(df$Grade == g)
    tmp <- data.frame("HW Cause" = df[i, "HW Cause"] / df[i, "Count"],
                                       "College Cause" = df[i, "College Cause"] / df[i, "Count"],
                                       "Parents Cause" = df[i, "Parents Cause"] / df[i, "Count"],
                                       "Sports Cause" = df[i, "Sports Cause"] / df[i, "Count"],
                                       "EC Cause" = df[i, "EC Cause"] / df[i, "Count"],
                                       "Test Cause" = df[i, "Test Cause"] / df[i, "Count"],
                                       "Social Cause" = df[i, "Social Cause"] / df[i, "Count"],
                                       "VG Relief" = df[i, "VG Relief"] / df[i, "Count"],
                                       "Exercise Relief" = df[i, "Exercise Relief"] / df[i, "Count"],
                                       "Instrument Relief" = df[i, "Instrument Relief"] / df[i, "Count"],
                                       "Organized Relief" = df[i, "Organized Relief"] / df[i, "Count"],
                                       "Art Relief" = df[i, "Art Relief"] / df[i, "Count"],
                                       "Social Relief" = df[i, "Social Relief"] / df[i, "Count"],
                                       "Sleep Relief" = df[i, "Sleep Relief"] / df[i, "Count"])
    
    return <- rbind(return, tmp)
  }
  rownames(return) <- c(9, 10, 11, 12)
  return(return)
}

compare <- function(df1, df2) {
  stress <- t.test(df1$`Stress Level`, df2$`Stress Level`)
  sleep <- t.test(df1$Sleep, df2$Sleep)
  factor <- list(stress, sleep)
  bool <- logical(0)
  
  for (i in c(1, 2)) {
    if (factor[[i]]$p.value < 0.05) {
      bool <- c(bool, FALSE)
    } else {
      bool <- c(bool, TRUE)
    }
  }
  return(data.frame('Stress' = bool[1], 'Sleep' = bool[2]))
}

sleep.to.stress <- function(df) {
  return(cor(df$`Stress Level`, df$Sleep) ^ 2)
}

# ggplot(stress_data, aes(x = `Stress Level`, y = Sleep, fill = Grade)) + 
 # geom_boxplot(outlier.color = 'black', outlier.shape = 16, outlier.size = 2, notch = FALSE)
