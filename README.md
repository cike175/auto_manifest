html5，自动化的manifest
===
html5离线应用，根据配置目录、文件列表，自动生成manifest文件，版本号同相关文件的最后更新时间

## 实现思路
使用php生成manifest文件，根据配置目录、文件列表，将缓存文件列表输出到manifest文件，同时比较文件修改时间，将最晚的时间作为版本号