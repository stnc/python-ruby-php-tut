# python-ruby-php-tut
python ruby php tutorials 

https://www.youtube.com/watch?v=ZMgLZUYd8Cw&vl=en

https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/

https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/


git add .

git commit -m "github key"

git push origin master

git pull origin master


Matthew's answer is great for removing remote branches and I also appreciate the explanation, but to make a simple distinction between the two commands:

To remove a local branch from your machine:

git branch -d {the_local_branch} (use -D instead to force deleting the branch without checking merged status)

To remove a remote branch from the server:

git push origin --delete {the_remote_branch}


## git remote 

https://help.github.com/articles/fetching-a-remote/

git clone https://github.com/USERNAME/REPOSITORY.git





git checkout v2

git branch

git add .

git commit -m xx"

git push origin v2

