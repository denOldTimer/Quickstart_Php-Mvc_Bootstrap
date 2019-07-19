# GIT CheatSheat

### Git: Configuration

- `$git config --global user.name "FirstName LastName"`
- `$git config --global user.email "your-email@email-provider.com"`
- `$git config --global color.ui true`
- `$git config --list`

### Git: Starting a repository

- `$git init`
- `$git status`

### Git: Starting files

- `$git add <file-name>`
- `$git add <file-name> <another-file-name> <yet-another-file-name>`
- `$git add .`
- `$git add -all`
- `$git add A`
- `$git rm --cached <file-name>`
- `$git reset <file-name>`

### Git: Commiting to a repository

- `$git commit -m "Your Message"`
- `$git reset --soft HEAD^`
- `$git commit --amend -m "Your Message"`

### Git: Pulling & Pushing from and to repositories

- `$git remote add origin <link>`
- `$git push -u origin master`
- `$git push -u origin gh-pages`
- `$git clone <clone>`
- `$git pull`\* `
- `$git push --set-upstream gh-pages gh-pages`

### Git Branching

- `$git branch`
- `$git branch <branch-name>`
- `$git checkout <branch-name>`
- `$git merge <branch-name>`
- `$git checkout -b <branch-name>`

### Git: Store git credentials on windows

If you use wincred for credential.helper, git is using the standard windows Credential Manager to store your credentials.

- `$git config --global credential.helper wincred`
- You can view the Credential Manager from your Control Panel settings.

### GitHub pages

1.  Create a new second branch called gh-pages

- `master` branch is for git => git push
- `gh-pages` branch is for deploy => npm run dploy

2.  Settings->Github Pages > Source => gh-pages branch
3.  git remote add origin <link>
4.  npm i --dev gh-pages
5.  package.json add script command "depoly": "gh-pages -d dist"
6.  npm run deploy

---

## WidePack Origin

- Add a remote origin  
  `git remote add origin <new git link>`
